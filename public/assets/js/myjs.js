function printErr(elementID,hintMess)
{
    document.getElementById(elementID).innerHTML=hintMess;
}
function validateCommentForm()
{
    var author = document.getElementById('author').value;
    var email = document.getElementById('email').value;
    var comment = document.getElementById('comment').value;
    var Author = document.getElementById('author');
    var Email = document.getElementById('email');
    var Comment = document.getElementById('comment');
    var AuthorErr = EmailErr = CommentErr = true;
// Validate author
    if (author==""){
        printErr("authorErr","Name must not be blank.");
        Author.classList.add("input-err");
    }else{
        printErr("authorErr","");
        Author.classList.remove("input-err");
        AuthorErr = false;
    }
// Validate email
if (email==""){
    printErr("emailErr","Email must not be blank.");
    Email.classList.add("input-err");
}else{
    printErr("emailErr","");
    Email.classList.remove("input-err");
    EmailErr = false;
}
// Validate comment
if (comment==""){
    printErr("commentErr","Comment must not be blank.");
    Comment.classList.add("input-err");
}else{
    printErr("commentErr","");
    Comment.classList.remove("input-err");
    CommentErr = false;
}



    if (AuthorErr==true||EmailErr==true||CommentErr==true)
    {
        return false;
    }
    else
    {
        return;
    }
}
