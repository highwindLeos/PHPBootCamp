<?php
/**
 * This is project's console commands configuration for Robo task runner.
 * Robo Library 테스트 자동화 파일 : 
 * .env  DB 설정을 잠시 anicoboardtest 로 변경했다가. 테스트를 마치면 service database로 다시 변경하는 로직.  
 * 
 * 실행 : document root 에서  robo codecept "acceptance 파일명" (테스트 파일명을 준다.) 매개변수 없이 호출하면 모든 테스트를 수행.
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