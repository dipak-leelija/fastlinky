

// reload the page 
const reloadPage = () =>{
    location.reload();
}

//delete an html eliment by id
const deleteElement = (elemId) =>{
    document.getElementById(elemId).remove();
}

// email validation 
function ValidateEmail(mailAddress) {

    if (mailAddress == '') {
        alert("Email address can not be blank!");
        return false;
    } else {
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        if (mailAddress.match(validRegex)) {
            return true;
        } else {
            alert("Invalid email address!");
            return false;
        }
    }

}


function validateUrl(urlString) {
    if (urlString == "") {
        alert("Domain Provider Url can not be blank!");
        return false;
    } else {
        let url;
        try {
            url = new URL(urlString);
        } catch (_) {
            alert("Invalid Url Provided")
            return false;
        }
        // return url.protocol === "http:" || url.protocol === "https:";
        return true;
    }
}


// Text Copy to Clipboard 
const copyText = (fieldId) => {
    var text = document.getElementById(fieldId);
    text.select();
    document.execCommand('copy');
    // alert('Copied');
}