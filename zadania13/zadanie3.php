<?php

trait A {
    public function smallTalk() {
        echo 'a';
    }
    public function bigTalk() {
        echo 'A';
    }
}

trait B {
    public function smallTalk() {
        echo 'b';
    }
    public function bigTalk() {
        echo 'B';
    }
}

class Talker {
    use A, B {
        A::smallTalk insteadof B;
        B::bigTalk insteadof A;
        A::bigTalk as bigTalkA;
        B::smallTalk as smallTalkB;
    }
}


$talker = new Talker();
$talker->smallTalk();
echo "\n";
$talker->bigTalk();
echo "\n";
$talker->bigTalkA();
echo "\n";
$talker->smallTalkB();
?>
