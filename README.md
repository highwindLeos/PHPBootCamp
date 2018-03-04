# PHP Bootcamp
### PHP Bootcamp in Study

PHP Camp에서 독학 + 코치를 통해 배우고 있는 
프로젝트입니다. Instargram 컨텐츠를 기본으로
PHP + Database 설계등 웹의 핵심기술을 학습하고 있습니다.

http://phpbootcamp.bookcafe100.com/course/self-study

Mark Down Snytex 학습
https://github.com/highwindLeos/PHPBootCamp/blob/master/MarkDownsyntex.md

# 기획 참고 자료 
### 과제 목록 :

https://docs.google.com/document/d/112pxsLec9MvixoBsAq5RY46zF-a6bFROWWWqkMbNDQ0/edit

### The Right Way : 모던 PHP의 정석.

http://modernpug.github.io/php-the-right-way/

# TEST ID : in This Application.

| Index | ID | Author |
|:---:|:---:|:---:|
| 1 | stonker@gmail.com | Leenara |
| 2 | highwind26@gmail.com | Leodays |
| 3 | highwind26@nate.com | Highwind |
| 4 | highwind26@naver.com | Laravel |
| 5 | leosdays@gmail.com | leosdays26 |
| 6 | leechar@gmail.com | CharLee |
| 8 | yosemite@gmail.com | Yosemite |
| 9 | datetime@gmail.com | datetime |
| 10 | gmail@gmail.com | Gmail |
| 11 | daysmays@naver.com | maydays |
| 12 | stonker26@gmail.com | MailLee |


### 학습 서적.

| Index | 도서명 | 저자 | 출판사 |
|:---:|:---:|:---:|:---:|
| 1 | SQL 첫걸음 | 아사이 아츠시 | 한빛 미디어 |
| 2 | Modean PHP | Josh Rockheart | 한빛 미디어 |

# PHP 의 유용한 문서들.

PHP 를 이용한 개발 테크 트리
나름대로 중요도 순  apm 및 환경관련 내용은 제외함

###기초

자료 구조 :  C언어로 쉽게 풀었쓴 자료구조 (이책이 초보 개발자들에게 학습 효과가 가장 좋았던  기억이있음)
알고리즘 : http://omnis.tistory.com/2
php 기본 연산자 비교 :  http://php.net/manual/kr/language.operators.comparison.php  
						// 실제 동작시 함수 나 모듈에 따라 전부 완전히 다름 무조건 메뉴얼 보며 return 값 보며 코딩함 
						(이것 때문에 php의 장점 거의 다 까먹음)
php 기본 문자열 함수, MB_string 계열, 

php 기본 배열 함수 들 array_??? : 의외로 기본 배열 처리 함수를 잘 안씀 일일이 만들어 쓰는 경향이 있음 기본 배열 함수는 
								C extension이라 속도가 훨씬 빠름 
정규표현식	
php 에서 한글 처리(초성 추출, 한글인코딩, 한글 형태소 기반  문자열 파싱 등등)

1. 객체지향 설계 : http://www.nextree.co.kr/p6960/

2. 디자인 패턴  http://designpatternsphpko.readthedocs.org/ko/latest/

3. php composer https://getcomposer.org/

4. 코드 규칙, 분석, 파편화, 검증 툴들 : http://phpqatools.org/
	php codesniffer :http://pear.php.net/package/PHP_CodeSniffer/redirected
	php depend : http://pdepend.org/ 
	PHP Mess Detector :  http://phpmd.org/
    PHP  metrics :  http://www.phpmetrics.org/

5. 객체 의존성 주입  :  디자인 패턴 공부 후 공부시 이해 금방됨 
    참고 문서 :  https://docs.phalconphp.com/en/latest/api/Phalcon_DI.html
    참고 문서 : http://code.tutsplus.com/tutorials/dependency-injection-in-php--net-28146

6. 프레임워크 패턴 공부 : 프레임워크 코드 뜾어 보며 디버깅 한다면 디자인 패턴 공부 끝
   라라벨 프레임워크:    https://www.laravel.co.kr/  
   					//성능은 딸리지만 디자인 패턴과 설계 방식이 가장 뛰어난
                    php 프레임워크임 data 모델은 phalcon이 가장 뛰어남

7. IDE 
	netbeans : https://netbeans.org/kb/docs/php/quickstart.html    
			   https://netbeans.org/features/php/
	eclipse : http://histlinux.egloos.com/v/1253065
	phpstom : https://www.jetbrains.com/phpstorm/

8. 디버깅
   http://xdebug.org/
   http://phpdebugbar.com/

9. unit test : 중규모 이상 부터 필수로 사용해야함
    phpunit : https://phpunit.de/

10. test automation : 테스트 자동화
   https://github.com/atinfo/awesome-test-automation/blob/master/php-test-automation.md
   http://codeception.com/quickstart
   http://www.seleniumhq.org/

11. 빌드,배포 자동화 : 여기 까지 오면 배포 자동화 까지 go go 사실상 배포 자동화 까지 오면 PHP의 거의 모든 툴들과 기능을 다 다룰줄 안다고
    볼 수있음 : 
	https://www.phptesting.org/
	https://continuousphp.com/tutorial/create-and-set-up-your-project-on-continuousphp/
	http://jenkins-ci.org/
	https://www.jetbrains.com/teamcity/

12. zephir : 가장 현실적인 php extension 개발 : php로 c++ 수준의 속도와 메모리 사용
	http://zephir-lang.com/
	https://github.com/phalcon/zephir

13. php extension 개발 (zend engine ) : php 성능을 극대화 시켜보자
	zend : http://php.net/manual/en/internals2.ze1.zendapi.php
    참고: http://egloos.zum.com/littletrue/v/3992537
		  http://www.php-cpp.com/documentation/your-first-extension
