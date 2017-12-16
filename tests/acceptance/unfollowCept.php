<?php 
// 언팔로우 절차. 

// 1. 회원데이터를 두명 추가한다. 
// 2. 홈페이지 루트로 접근.
// 3. 로그인 링크를 클릭.
// 4. 1번 사용자아이디(이메일) 입력 폼에 이메일을 입력함.
// 5. 1번 패스워드 입력 폼에 비밀번호를 입력.
// 6. 로그인 버튼을 클릭.
// 7. 메인페이지가 보이며 로그인 사용자를 확인한다.
// 8. 2번 회원의 프로필 페이지로 접근. 접근을 확인.
// 9. follow  버튼을 클릭.
// 10. follows 데이터베이스에 값이 있는지 확인.
// 11. unfollow 버튼을 클릭.
// 12. follows 데이터베이스에 값이 없는지 확인.

$I = new AcceptanceTester($scenario);

//  1.회원데이터를  두개 추가한다. 
$email1 = "highwindtest@gmail.com";
$name1 = "이유리";
$author1 = "YuriLee";
$password1 = "stonker26";

$options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
]; #솔트 (추가문자열 암호화 옵션, 3번째 인자값)
$hashpass1 = password_hash(trim($password1), PASSWORD_BCRYPT, $options); #암호화 코드

$I->haveInDatabase('users', array('email' => $email1, 'name' => $name1, 'author' => $author1, 'password' => $hashpass1)); #테스트 DB에 값을 입력
$userid = $I->grabFromDatabase('users', 'id'); 

$email2 = "highwindtest2@gmail.com";
$name2 = "이유리2";
$author2 = "YuriLee2";
$password2 = "stonker26";

$options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
]; #솔트 (추가문자열 암호화 옵션, 3번째 인자값)
$hashpass2 = password_hash(trim($password2), PASSWORD_BCRYPT, $options); #암호화 코드

$I->haveInDatabase('users', array('email' => $email2, 'name' => $name2, 'author' => $author2, 'password' => $hashpass2)); #테스트 DB에 값을 입력

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
$I->seeInCurrentUrl('main.php');
$I->seeInTitle('PHP BootCamp AnInstargram - Main');
$I->see($author1);

// 8. 2번 회원의 프로필 페이지로 접근. 접근을 확인.
$I->amOnPage('/profile.php?author='.$author2); 

$I->seeInCurrentUrl('profile.php?author='.$author2);
$I->seeInTitle('PHP BootCamp AnInstargram - Profile');
$I->see($author2);

// 9. follow  버튼을 클릭.
$I->click('follow');

// 10. follows 데이터베이스에 값이 있는지 확인.
$I->seeInDatabase('follows', ['follow' => '2','follower' => $author1 ]);

// 11. unfollow 버튼을 클릭.
$I->click('unfollow');

// 12. follows 데이터베이스에 값이 없는지 확인.
$I->dontSeeInDatabase('follows', ['follow' => '2','follower' => $author1 ]);
