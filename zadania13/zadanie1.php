<?php

interface Volume {
    public function increaseVolume();
    public function decreaseVolume();
}

interface Playable {
    public function play();
    public function stop();
}

class MusicPlayer implements Volume, Playable {
    private $volume;
    private $isPlaying;

    public function __construct() {
        $this->volume = 11;
        $this->isPlaying = false;
    }

    public function increaseVolume() {
        if ($this->volume < 10) {
            $this->volume++;
        }
    }

    public function decreaseVolume() {
        if ($this->volume > 0) {
            $this->volume--;
        }
    }

    public function play() {
        $this->isPlaying = true;
    }

    public function stop() {
        $this->isPlaying = false;
    }

    public function getVolume() {
        return $this->volume;
    }

    public function getStatus() {
        return $this->isPlaying ? "Playing" : "Stopped";
    }
}


$player = new MusicPlayer();

$player->increaseVolume();
echo "Volume: " . $player->getVolume() . "\n";

$player->decreaseVolume();
echo "Volume: " . $player->getVolume() . "\n";

$player->play();
echo "Status: " . $player->getStatus() . "\n";

$player->stop();
echo "Status: " . $player->getStatus() . "\n";
?>
