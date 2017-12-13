<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    // define public methods as commands
    public function codecept($target){
        $this->taskReplaceInFile('config/.env')
        ->from('anicoboard')
        ->to('anicoboardtest')
        ->run();

        $this->_exec("php codecept.phar run $target"); # 실행시 robo codecept "acceptance 파일명" (테스트 파일명을 준다.)

        $this->taskReplaceInFile('config/.env')
        ->from('anicoboardtest')
        ->to('anicoboard')
        ->run();
    }
    
}