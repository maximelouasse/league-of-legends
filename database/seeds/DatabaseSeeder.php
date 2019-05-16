<?php

use Illuminate\Database\Seeder;
use App\Champion;
use App\Avatar;
use App\Item;
use App\Skill;
use App\SummonerSpell;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $creator = new Creator();
        $creator->name = 'George R.R. Martin';
        $creator->save();
        $poster = new Poster();
        $poster->url = 'httpc://www.example.test/image.png';
        $poster->save();
        $show = new TvShow();
        $show->title = 'Game of Thrones';
        /** Association of a creator to a show */
        $show->creator()->associate($creator);
        /** Association of a poster to a show */
        $show->poster()->associate($poster);
        $show->save();
        $episode = new Episode();
        $episode->title = 'Red Wedding';
        /** We can associate an episode to a show... */
        $episode->tvShow()->associate($show);
        $episode->save();
        $otherEpisode = new Episode([
            'title' => 'The Battle of Bastards'
        ]);
        /** We can associate an episode to a show... */
        $show->episodes()->save($otherEpisode);
    }
}
