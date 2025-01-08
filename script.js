function studentRegistration() {
    var fname = document.getElementById('fname');
    var lname = document.getElementById('lname');
    var email = document.getElementById('email');
    var password = document.getElementById('pw');
    var school = document.getElementById('school');
    var grade = document.getElementById('grade');
    var gender = document.getElementById('gender');

    var f = new FormData();
    f.append("fname",fname.value);
    f.append("lname",lname.value);
    f.append("email",email.value);
    f.append("password",password.value);
    f.append("school",school.value);
    f.append("grade",grade.value);
    f.append("gender",gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "success") {
                alert("registration succesfull");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","studentRegistrationProcess.php",true);
    r.send(f);
}

function teacherRegistration() {
    var fname = document.getElementById('fname');
    var lname = document.getElementById('lname');
    var email = document.getElementById('email');
    var password = document.getElementById('pw');
    var nic = document.getElementById('nic');
    var mobile = document.getElementById('mobile');
    var gender = document.getElementById('gender');

    var f = new FormData();
    f.append("fname",fname.value);
    f.append("lname",lname.value);
    f.append("email",email.value);
    f.append("password",password.value);
    f.append("nic",nic.value);
    f.append("mobile",mobile.value);
    f.append("gender",gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "success") {
                alert("Registration Succesfull");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","teacherRegistrationProcess.php",true);
    r.send(f);
}

function aoRegistration() {
    var fname = document.getElementById('fname');
    var lname = document.getElementById('lname');
    var email = document.getElementById('email');
    var password = document.getElementById('pw');
    var nic = document.getElementById('nic');
    var mobile = document.getElementById('mobile');
    var gender = document.getElementById('gender');

    var f = new FormData();
    f.append("fname",fname.value);
    f.append("lname",lname.value);
    f.append("email",email.value);
    f.append("password",password.value);
    f.append("nic",nic.value);
    f.append("mobile",mobile.value);
    f.append("gender",gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "success") {
                alert("Registration Succesfull");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","aoRegistrationProcess.php",true);
    r.send(f);
}

function adminSignIn() {
    var email = document.getElementById("admine");
    var password = document.getElementById("adminpw");

    var f = new FormData();
    f.append("admine",email.value);
    f.append("adminpw",password.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "success") {
                window.location = 'adminDashboard.php';
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","adminSignin.php",true);
    r.send(f);
}

function sentInvitation(email) {
    
    var f = new FormData();
    f.append("email",email);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "Success") {
                alert("Verification Code Sent");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","sendTeacherInvitationProcess.php",true);
    r.send(f);
}

function teacherVerification() {
    var temail = document.getElementById("temail");
    var tpassword = document.getElementById("tpw");
    var Vcode = document.getElementById("tvcode");

    var f = new FormData();
    f.append("temail",temail.value);
    f.append("tpw",tpassword.value);
    f.append("Vcode",Vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "success") {
                alert("Verification Successfull");
                window.location = 'index.php';
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","teacherVerificationProcess.php",true);
    r.send(f);
}

function teacherStatus(email) {
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "Blocked") {
                alert(email + " Has Been Blocked");
                window.location.reload();
            } else if(t == "Unblocked") {
                alert(email + " Has Been Unblocked");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET","teacherStatusProcess.php?e=" + email,true);
    r.send();
}


function sentInvitationAO(email) {
    var f = new FormData();
    f.append("emailAO",email);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "Success") {
                alert("Verification Code Sent");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","sendAOInvitationProcess.php",true);
    r.send(f);
}

function aoVerification() {
    var aoemail = document.getElementById('aoemail');
    var aopw = document.getElementById('aopw');
    var aovcode = document.getElementById('aovcode');

    var f = new FormData();
    f.append("aoemail",aoemail.value);
    f.append("aopw",aopw.value);
    f.append("aovcode",aovcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "success") {
                alert("Verification Successfull");
                window.location = 'index.php';
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","academicOfficerVerificationProcess.php",true);
    r.send(f);
}

function aoStatus(email) {
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "Blocked") {
                alert(email + " Has Been Blocked");
                window.location.reload();
            } else if(t == "Unblocked") {
                alert(email + " Has Been Unblocked");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET","academicOfficerStatusProcess.php?e=" + email,true);
    r.send();
}

function studentStatus(email) {
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "Blocked") {
                alert(email + " Has Been Blocked");
                window.location.reload();
            } else if(t == "Unblocked") {
                alert(email + " Has Been Unblocked");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET","studentStatusProcess.php?e=" + email,true);
    r.send();
}

function addProfileImage() {
    var img = document.getElementById("img");
    var fimg = document.getElementById("profileimg");
  
    fimg.onchange = function (){
      var file1 = this.files[0];
      var url = window.URL.createObjectURL(file1);
      img.src = url;
    }
  
}

function updateAdminProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var pimg = document.getElementById("profileimg");
  
    var f = new FormData();
    f.append("fname",fname.value);
    f.append("lname",lname.value);
    f.append("mobile",mobile.value);
    
    if(pimg.files.length == 0) {
  
      var confirmation = confirm("Are you sure You don't want to update Profile Image?");
  
      if(confirmation){
        alert ("You have not selected any image");
      }
  
    } else {
      f.append("pimg",pimg.files[0]);
    }
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function() {
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
            alert("Your Profile Has Been Updated.");
            window.location.reload();
        } else {
            alert(t);
        }
      }
    }
  
    r.open("POST","updateAdminProfileProcess.php",true);
    r.send(f);
  
}

function adminLogOut(){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
          window.location = 'adminLogin.php';
        } else {
          alert(t);
        }
      }
    }
  
    r.open("GET","adminSignout.php",true);
    r.send();
}

function StudentSignIn() {
    var email = document.getElementById("studentemail");
    var password = document.getElementById("studentpw");
    var rm = document.getElementById("rm");

    var f = new FormData();
    f.append("studentemail",email.value);
    f.append("studentpw",password.value);
    f.append("rm",rm.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "success") {
                window.location = 'studentPanel.php';
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","studentLoginProcess.php",true);
    r.send(f);
}

function teacherSignIn(){
    var email = document.getElementById("temail");
    var password = document.getElementById("tpw");
    var rm = document.getElementById("trm");

    var f = new FormData();
    f.append("temail",email.value);
    f.append("tpw",password.value);
    f.append("trm",rm.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "success") {
                window.location = 'teacherPanel.php';
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","teacherLoginProcess.php",true);
    r.send(f);
}

function aoSignIn(){
    var email = document.getElementById("aoemail");
    var password = document.getElementById("aopw");
    var rm = document.getElementById("aorm");

    var f = new FormData();
    f.append("aoemail",email.value);
    f.append("aopw",password.value);
    f.append("aorm",rm.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "success") {
                window.location = 'AOPanel.php';
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","AOLoginProcess.php",true);
    r.send(f);
}

function updateTeacherProfile(){
    var fname = document.getElementById("fname");
    var mname = document.getElementById("mname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var pimg = document.getElementById("profileimg");
  
    var f = new FormData();
    f.append("fname",fname.value);
    f.append("mname",mname.value);
    f.append("lname",lname.value);
    f.append("mobile",mobile.value);
    
    if(pimg.files.length == 0) {
  
      var confirmation = confirm("Are you sure You don't want to update Profile Image?");
  
      if(confirmation){
        alert ("You have not selected any image");
      }
  
    } else {
      f.append("pimg",pimg.files[0]);
    }
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function() {
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
            alert("Your Profile Has Been Updated.");
            window.location.reload();
        } else {
            alert(t);
        }
      }
    }
  
    r.open("POST","updateTeacherProfileProcess.php",true);
    r.send(f);
}

function teacherLogOut(){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
          window.location = 'teacherLogin.php';
        } else {
          alert(t);
        }
      }
    }
  
    r.open("GET","teacherSignout.php",true);
    r.send();
}

var al;
function addLessonNotes() {
    var m = document.getElementById("addlessonModal");
    al = new bootstrap.Modal(m);
    al.show();
}

function uploadLessonNote(id) {
    var name = document.getElementById("name");
    var lessonNote = document.getElementById("file");

    var f = new FormData();
    f.append("lesson_id",id);
    f.append("file_name",name.value);
    f.append("lessonNote",lessonNote.files[0]);
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function() {
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
            alert("Upload Successfully");
            window.location.reload();
        } else if(t == "success2"){
            alert("File update Successfully");
            window.location.reload();
        } else {
            alert(t);
        }
      }
    }
  
    r.open("POST","uploadLessonNoteProcess.php",true);
    r.send(f);
}

function uploadAssingments(id) {
    var name = document.getElementById("name");
    var assingments = document.getElementById("file");

    var f = new FormData();
    f.append("lesson_id",id);
    f.append("file_name",name.value);
    f.append("assingments",assingments.files[0]);
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function() {
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
            alert("Upload Successfully");
            window.location.reload();
        } else if(t == "success2"){
            alert("File update Successfully");
            window.location.reload();
        } else {
            alert(t);
        }
      }
    }
  
    r.open("POST","uploadAssingmentsProcess.php",true);
    r.send(f);
}

function updateAcademicOfficerProfile(){
    var fname = document.getElementById("fname");
    var mname = document.getElementById("mname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var pimg = document.getElementById("profileimg");
  
    var f = new FormData();
    f.append("fname",fname.value);
    f.append("mname",mname.value);
    f.append("lname",lname.value);
    f.append("mobile",mobile.value);
    
    if(pimg.files.length == 0) {
  
      var confirmation = confirm("Are you sure You don't want to update Profile Image?");
  
      if(confirmation){
        alert ("You have not selected any image");
      }
  
    } else {
      f.append("pimg",pimg.files[0]);
    }
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function() {
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
            alert("Your Profile Has Been Updated.");
            window.location.reload();
        } else {
            alert(t);
        }
      }
    }
  
    r.open("POST","updateAOProfileProcess.php",true);
    r.send(f);
}

function academicOfficerLogOut(){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
          window.location = 'academicOfficerLogin.php';
        } else {
          alert(t);
        }
      }
    }
  
    r.open("GET","AOSignout.php",true);
    r.send();
}

function sentStudentInvitation(email){
    var f = new FormData();
    f.append("emailStudent",email);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "Success") {
                alert("Verification Code Sent");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","sendStudentInvitationProcess.php",true);
    r.send(f);
}

function studentVerification(){
    var stuemail = document.getElementById('studentemail');
    var stupw = document.getElementById('studentpw');
    var stuvcode = document.getElementById('studentvcode');

    var f = new FormData();
    f.append("stuemail",stuemail.value);
    f.append("stupw",stupw.value);
    f.append("stuvcode",stuvcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4) {
            var t = r.responseText;
            if(t == "success") {
                alert("Verification Successfull");
                window.location = 'index.php';
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","studentVerificationProcess.php",true);
    r.send(f);
}

function studentLogOut(){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
          window.location = 'studentLogin.php';
        } else {
          alert(t);
        }
      }
    }
  
    r.open("GET","studentSignout.php",true);
    r.send();
}

function updateStudentProfile() {
    var fname = document.getElementById("fname");
    var mname = document.getElementById("mname");
    var lname = document.getElementById("lname");
    var school = document.getElementById("school");
    var pimg = document.getElementById("profileimg");
  
    var f = new FormData();
    f.append("fname",fname.value);
    f.append("mname",mname.value);
    f.append("lname",lname.value);
    f.append("school",school.value);
    
    if(pimg.files.length == 0) {
  
      var confirmation = confirm("Are you sure You don't want to update Profile Image?");
  
      if(confirmation){
        alert ("You have not selected any image");
      }
  
    } else {
      f.append("pimg",pimg.files[0]);
    }
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function() {
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
            alert("Your Profile Has Been Updated.");
            window.location.reload();
        } else {
            alert(t);
        }
      }
    }
  
    r.open("POST","updateStudentProfileProcess.php",true);
    r.send(f);
}

var da;
function ViewAssingments() {
    var m = document.getElementById("downloadAssingmentModal");
    da = new bootstrap.Modal(m);
    da.show();
}

var ua;
function openAnswers() {
    var m = document.getElementById("addAnswersModal");
    ua = new bootstrap.Modal(m);
    ua.show();
}


function uploadStudentAssingment(id) {
    var name = document.getElementById("name");
    var Answer = document.getElementById("file");

    var f = new FormData();
    f.append("lesson_id",id);
    f.append("file_name",name.value);
    f.append("answerSheet",Answer.files[0]);
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function() {
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
            alert("Upload Successfully");
            window.location.reload();
        } else if(t == "success2"){
            alert("File update Successfully");
            window.location.reload();
        } else {
            alert(t);
        }
      }
    }
  
    r.open("POST","uploadAnswersProcess.php",true);
    r.send(f);
}

var vp;
function viewAnswerSheet() {
    var m = document.getElementById("ViewModal");
    vp = new bootstrap.Modal(m);
    vp.show();
    al.hide();
}

var um;
function uploadMarkView() {
    var m = document.getElementById("viewUploadModal");
    um = new bootstrap.Modal(m);
    um.show();
    vp.hide();
}

function uploadMark(id){
    var mark = document.getElementById("mark");

    var f = new FormData();
    f.append("answer_id",id);
    f.append("mark",mark.value);
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function() {
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
            alert("Mark Upload Successfully");
            window.location.reload();
        } else if(t == "success2"){
            alert("Mark Update Successfully");
            window.location.reload();
        } else {
            alert(t);
        }
      }
    }
  
    r.open("POST","uploadMarkProcess.php",true);
    r.send(f);
    
}

var vl;
function viewLessons(){
    var m = document.getElementById("viewLessonModel");
    vl = new bootstrap.Modal(m);
    vl.show();
    da.hide();
}

function releaseMark(id){
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function() {
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
            alert("Mark Not Released Successfully");
            window.location.reload();
        } else if(t == "success2"){
            alert("Mark Released Successfully");
            window.location.reload();
        } else {
            alert(t);
        }
      }
    }
  
    r.open("POST","ReleaseMarkProcess.php?id=" + id,true);
    r.send();
}


var cgs;
function changeGradeSubject(){
    var m = document.getElementById("changeGreadeSubjectModal");
    cgs = new bootstrap.Modal(m);
    cgs.show();
}

function changegands(email){
    var subject = document.getElementById("subject");
    var grade = document.getElementById("grade");

    var f = new FormData();
    f.append("subject",subject.value);
    f.append("grade",grade.value);
    f.append("email",email);
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function() {
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
            alert("Grade And Subject Updated");
            window.location.reload();
        } else {
            alert(t);
        }
      }
    }
  
    r.open("POST","changeSubjectandGradeProcess.php",true);
    r.send(f);
    
}

var csg;
function changeStudentgrade(){
    var m = document.getElementById("changeStudentGradeModal");
    csg = new bootstrap.Modal(m);
    csg.show();
}


function changestuGrade(email){
    var grade = document.getElementById("grade");

    var f = new FormData();
    f.append("grade",grade.value);
    f.append("email",email);
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function() {
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success") {
            alert("Grade Updated");
            window.location.reload();
        } else {
            alert(t);
        }
      }
    }
  
    r.open("POST","changeStudentGrade.php",true);
    r.send(f);
}


function payNow(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            var obj = JSON.parse(t);

            var mail = obj["mail"];
            var amount = obj["amount"];

            if(t == "1"){
                alert ("Please Log in or Sign Up");
                window.location = "index.php";
            } else if (t == "2") {
                alert ("Student Not Valid");
            } else {
                // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);

        saveInvoice(orderId,mail,id,amount);

        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": "1221624",    // Replace your Merchant ID
        "return_url": "http://localhost/SMS/studentPayment.php",     // Important
        "cancel_url": "http://localhost/SMS/studentPayment.php",     // Important
        "notify_url": "http://sample.com/notify",
        "order_id": obj["id"],
        "items": "Student Portal Payment",
        "amount": amount,
        "currency": "LKR",
        "first_name": obj["fname"],
        "last_name": obj["lname"],
        "email": mail,
        "phone": "",
        "address": "",
        "city": "",
        "country": "Sri Lanka",
        "delivery_address": "",
        "delivery_city": "",
        "delivery_country": "Sri Lanka",
        "custom_1": "",
        "custom_2": ""
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
    // };
            }

        }
    }

    r.open("GET", "buyNowProcess.php?id=" + id, true);
    r.send();

}

function saveInvoice(orderId,id,mail,amount){

    var f = new FormData();
    f.append("order_id",orderId);
    f.append("amount_id",id);
    f.append("email",mail);
    f.append("amount",amount);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if(t == "success"){
                window.location = "invoice.php?id=" + orderId;
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "saveInvoice.php", true);
    r.send(f);
 
}
