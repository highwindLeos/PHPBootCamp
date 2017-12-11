<?php 
// 회원 로그인 절차
//  회원데이터를 하나 추가한다. 
// 1. 홈페이지 루트로 접근.
// 2. 로그인 링크를 클릭
// 3. 사용자아이디(이메일) 입력 폼에 이메일을 입력함.
// 4. 패스워드 입력 폼에 비밀번호를 입력.
// 5. 로그인 버튼을 클릭.
// 6. 메인페이지가 보이며  사용자 가 쓴 글이 표시됨.


$I = new AcceptanceTester($scenario);

//  회원데이터를 하나 추가한다. 
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

# 데이터베이스의 값을 조회해서 값의 유무를 확임함.
$I->dontSeeInDatabase('users', ['email' => 'highwindtest@gmail.com']); 

// 1. 홈페이지 루트로 접근.
$I->amOnPage('/'); 

// 2. 로그인 링크를 클릭
$I->click('로그인.'); 

// 3. 사용자아이디(이메일) 입력 폼에 이메일을 입력함.
$I->fillField('email', 'highwindtest@gmail.com'); 

// 4. 패스워드 입력 폼에 비밀번호를 입력.
$I->fillField('password','stonker26');

// 5. 로그인 버튼을 클릭.
$I->click('button'); 

// 6. 메인페이지가 보이며 사용자 명이 세션으로 출력되는 것을 확인.
$I->seeInCurrentUrl('main.php');
$I->seeInTitle('PHP BootCamp AnInstargram - Main');