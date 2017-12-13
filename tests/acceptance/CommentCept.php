<?php 
// 내용 입력 및 코멘트 달기 절차
// 1. 회원데이터를 하나 추가한다. 
// 2. 홈페이지 루트로 접근.
// 3. 로그인 링크를 클릭
// 4. 사용자아이디(이메일) 입력 폼에 이메일을 입력함.
// 5. 패스워드 입력 폼에 비밀번호를 입력.
// 6. 로그인 버튼을 클릭.
// 7. 메인페이지가 보이며  사용자 가 쓴 글이 표시됨.
// 8.  Articles Table 내용을 하나 추가. 
// 9. 내용이 데이터 베이스에 들어 왔는지 확인 (articles table)
//10. 내용이 main.php 에 뿌려졌는지 확인.
//11. 코멘트 입력폼에 내용을 입력하고 입력 버튼을 클릭
//12. 코멘트 DB 에 값이 있는지를 확인.

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
$I->seeInCurrentUrl('main.php');
$I->seeInTitle('PHP BootCamp AnInstargram - Main');
$I->see($author);

// 8.  Articles 와 pictures Table 내용을 하나 추가. 
$article = "Article test"; # 내용
$date = "2017-12-12"; #현제 시간 MYSQL 함수.
$picture = 'img/image/img1.png';

$I->haveInDatabase('articles', array('article' => $article, 'date' => $date, 'users_id' => $userid)); #테스트 DB에 값을 입력
$articles_id = $I->grabFromDatabase('articles', 'id'); 

$I->haveInDatabase('pictures', array('src' => $picture, 'articles_id' => $articles_id)); #테스트 DB에 값을 입력

//9. 내용이 데이터 베이스에 들어 왔는지 확인 (articles table)
$I->seeInDatabase('articles', ['article' => 'Article test']);
$I->amOnPage('/main.php');
 
//10. 내용이 main.php 에 뿌려졌는지 확인.
$I->see($article);

//11. 코멘트 입력폼에 내용을 입력하고 입력 버튼을 클릭
$I->fillField('comment', 'comment test'); 
$I->click('img', '.commentbtn'); 


//12. 코멘트 DB 에 값이 있는지를 확인.
$I->seeInDatabase('comments', ['comment' => 'comment test']);
