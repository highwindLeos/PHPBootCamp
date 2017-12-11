<?php 
# 회원가입 테스트.
// 회원가입 절차.
// 1. 홈페이지 루트로 접근.
// 2. 이메일 입력 폼에  가입할 이메일을 입력.
// 3. 성명 입력폼에 이름 입력
// 4. 사용자 이름 입력폼에 사용자를 입력.
// 5. 패스워드 입력 폼에 비밀번호를 입력.
// 6. 가입 버튼을 클릭 해서 입력 완료.
// 7. 메인 페이지가 보이며  데이터베이스 테이블에 입력했던 값들이 행으로 추가되어야 함.

$I = new AcceptanceTester($scenario);

# 데이터베이스의 값을 조회해서 값의 유무를 확임함.
$I->dontSeeInDatabase('users', ['email' => 'highwindtest@gmail.com']); 

// 1. 홈페이지 루트로 접근.
$I->amOnPage('/'); 

// 2. 이메일 입력 폼에  가입할 이메일을 입력.
$I->fillField('email', 'highwindtest@gmail.com'); 
// 3. 성명 입력폼에 이름 입력
$I->fillField('name','이유리');
// 4. 사용자 이름 입력폼에 사용자를 입력.
$I->fillField('author','YuriLee');
// 5. 패스워드 입력 폼에 비밀번호를 입력.
$I->fillField('password','stonker26');

// 6. 가입 버튼을 클릭 해서 입력 완료.value 값이 잇는 요소를 클릭.
$I->click('button'); 

// 7. 메인 페이지가 보이며  데이터베이스 테이블에 입력했던 값들이 행으로 추가되어야 함.데이터 베이스 의 값을 조회. users table에 email 컬럼.
$I->seeInCurrentUrl('main.php');
$I->seeInTitle('PHP BootCamp AnInstargram - Main');
$I->seeInDatabase('users', ['email' => 'highwindtest@gmail.com']); 