<?php

require_once __DIR__."/vendor/autoload.php";

use MongoDB\Client;

class Football
{
    private $db;
    private $team;
    private $game;

    public function __construct()
    {
        $this->db = new \MongoDB\Client("mongodb://127.0.0.1/");
        $this->team = $this->db->football->team;
        $this->game = $this->db->football->game;
    }

    public function league(): void
    {
        $statement = $this->game->distinct("league");
        foreach ($statement as $data) {
            echo "<option value='$data'>$data</option>";
        }
    }

    public function teams(): void
    {
        $statement = $this->team->distinct("title");
        foreach ($statement as $data) {
            echo "<option value='$data'>$data</option>";
        }
    }

    public function findLeague($league): void
    {
        $statement = $this->game->find(["league" => $league]);
        echo "<div id='league'>";
        foreach ($statement as $data) {
            echo "Date: {$data["date"]}, Score: {$data['score']}, Team One: {$data['team1']}, Team Two: {$data['team2']}<br>";
        }
        echo "</div>";
    }

    public function findGames($team): void
    {
        $statement = $this->game->find(['$or'=>[['team1'=>$team], ['team2'=>$team]]]);
        echo "<div id='team'>";
        foreach ($statement as $data) {
            echo "Date: {$data['date']}, Score: {$data['score']}, Team One: {$data['team1']}, Team Two: {$data['team2']}<br>";
        }
        echo "</div>";

    }

    public function findPlayers($player): void
    {
        $statement = $this->team->find(["title" => $player]);
        echo "<div id='player'> Players:<br>";
        foreach ($statement->toArray()[0]['players'] as $data) {
            echo "$data<br>";
        }
        echo "</div>";
    }
}