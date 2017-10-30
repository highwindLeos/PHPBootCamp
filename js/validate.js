function checkForm() {
    
    var Email = document.fmField.userEmail;
    // 이메일 입력 유무 체크
    if(Email.value == '') {
        window.alert("이메일을 입력하시오");
        document.fmField.userEmail.focus();
        document.getElementById('userEmail').select();
        return false; // 입력이 안되어 있다면 submint 이벤트를 중지
    }
    
    var x = document.forms["fmField"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){ //@ 가 한자 이상, . 이 한자 이하.
        window.alert("이메일 형식에 맞게 입력하시오");
        document.fmField.userEmail.focus();
        document.getElementById('userEmail').select();
        return false; // 입력이 안되어 있다면 submint 이벤트를 중지
    }
        
    var Name = document.getElementById('userName');
    // 이름 입력 유무 체크
    if(document.fmField.userName.value == ''){
        alert('이름을 입력하세요.');
        Name.focus();
        return false; // 입력이 안되어 있다면 submint 이벤트를 중지
    }
    
    var Author = document.getElementById('userAuthor');
    // 별명 입력 유무 체크
    if(document.fmField.userAuthor.value == ''){
        alert('별명을 입력하세요.');
        Author.focus();
        return false; // 입력이 안되어 있다면 submint 이벤트를 중지
    }
    
    var Password = document.getElementById('userPassword');
    // 암호 입력 유무 체크
    if(document.fmField.userPassword.value == ''){
        alert('암호를 입력하세요.');
        Password.focus();
        return false; // 입력이 안되어 있다면 submint 이벤트를 중지
    }
    
    if(document.fmField.userPassword.value < 6){
        alert('암호를 6자 이상 입력하세요.');
        Password.focus();
        return false; // 입력이 안되어 있다면 submint 이벤트를 중지
    }
}