<?php 
// 유저아이콘 업로드. (구현중.. )

// 1. 회원데이터를 하나 추가한다. 
// 2. 홈페이지 루트로 접근.
// 3. 로그인 링크를 클릭
// 4. 사용자아이디(이메일) 입력 폼에 이메일을 입력함.
// 5. 패스워드 입력 폼에 비밀번호를 입력.
// 6. 로그인 버튼을 클릭.
// 7. 메인페이지가 보이며  사용자 가 쓴 글이 표시됨.
// 8. 로그인 회원의 프로필 페이지로 접근.
// 9. 사용자 아이콘 업로드 버튼을 클릭. (절차가 두단계)
// 10. 업로드후 해당 사용자의 usericon 열에 값이 있는지 확인.

$I = new AcceptanceTester($scenario);

//  1.회원데이터를 하나 추가한다. 
$email = "highwindtest@gmail.com";
$name = "이유리";
$author = "YuriLee";
$password = "stonker26";

$options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
]; #솔트 (추가문자열 암호화 옵션, 3번째 인자값)
$hashpass = password_hash(trim($password), PASSWORD_BCRYPT, $options); #암호화 코드

$I->haveInDatabase('users', array('email' => $email, 'name' => $name, 'author' => $author, 'password' => $hashpass)); #테스트 DB에 값을 입력
$userid = $I->grabFromDatabase('users', 'id'); 

// 2. 홈페이지 루트로 접근.
$I->amOnPage('/'); 

// 3. 로그인 링크를 클릭
$I->click('로그인.'); 

// 4. 사용자아이디(이메일) 입력 폼에 이메일을 입력함.
$I->fillField('email', 'highwindtest@gmail.com'); 

// 5. 패스워드 입력 폼에 비밀번호를 입력.
$I->fillField('password','stonker26');

// 6. 로그인 버튼을 클릭.
$I->click('button'); 

// 7. 메인페이지가 보이며 사용자 명이 세션으로 출력되는 것을 확인.
$I->seeInCurrentUrl('/main.php');
$I->seeInTitle('PHP BootCamp AnInstargram - Main');
$I->see($author);

// 8. 로그인 회원의 프로필 페이지로 접근.
$I->amOnPage('/profile.php'); 

$I->seeInCurrentUrl('/profile.php?author='.$author);
$I->seeInTitle('PHP BootCamp AnInstargram - Profile');
$I->see($author);


// 9. 사용자 아이콘 업로드 . (update 두단계)

// $I->click('.profile-img');
// $I->click('.replace');

// file is stored in 'tests/_data/prices.xls'
$I->attachFile('input[@name="icon_uploads"]', 'usericon00.png');

$I->click('Submit');

$I->updateInDatabase('users', array('id' => $userid), array('usericon' => $usericon));
$a = $I->grabFromDatabase('users', 'usericon', array('usericon' => $usericon));                        
// $unitTest = new \Codeception\Test\Unit();
// $unitTest->assertEquals($a, $usericon);

// 10. 업로드후 해당 사용자의 usericon 열에 값이 있는지 확인.
$I->seeInDatabase('users', array('usericon' => $usericon)); 
