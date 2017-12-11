<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    // define public methods as commands
    public function codecept(){
        $this->taskReplaceInFile('config/.env')
        ->from('anicoboard')
        ->to('anicoboardtest')
        ->run();

        $this->_exec('php codecept.phar run');

        $this->taskReplaceInFile('config/.env')
        ->from('anicoboardtest')
        ->to('anicoboard')
        ->run();
    }
    
}