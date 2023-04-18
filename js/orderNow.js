$(document).ready(function() {
    $('#contentCreationPlacement').click(function() {
        $('.contentPlacement').css('display', 'none');
        $('.contentCreationPlacement').css('display', 'block');
    });
    $('#contentPlaceMent').click(function() {
        $('.contentPlacement').css('display', 'block');
        $('.contentCreationPlacement').css('display', 'none');
    });
})


function WordCount(str) {
    return str.split(" ").length;
}



function validateForm1() {
    let contentTitle = document.forms["contentPlacementForm"]["clientContentTitle1"].value;
    let content = document.forms["contentPlacementForm"]["clientContent1"].value;
    let targetUrl = document.forms["contentPlacementForm"]["clientTargetUrl1"].value;
    let AnchorText = document.forms["contentPlacementForm"]["clientAnchorText1"].value;
    // let x = document.forms["contentPlacementForm"]["clientRequirement1"].value;

    if (contentTitle == "") {
        alert("Please add the title!");
        return false;
    }

    if (content == "") {
        alert("Content Field Can Not Be Blank!");
        return false;
    } else {
        let words = WordCount(content);
        if (words < 500) {
            alert("Content Should Be More Than 500 Words!");
            return false;
        }
    }


    if (targetUrl == "") {
        alert("Url can not be blank!");
        return false;
    } else {
        let url;
        try {
            url = new URL(targetUrl);
        } catch (_) {
            alert("Invalid Url Provided")
            return false;
        }
        // return url.protocol === "http:" || url.protocol === "https:";
        // return true;
    }


    if (AnchorText == "") {
        alert("Anchor Text Can Not Br Blank!");
        return false;
    }
}



function validateForm2() {
    let clientTargetUrl2 = document.forms["contentCreationPlacementForm"]["clientTargetUrl2"].value;
    let clientAnchorText2 = document.forms["contentCreationPlacementForm"]["clientAnchorText2"].value;

    if (clientTargetUrl2 == "") {
        alert("Url can not be blank!");
        return false;
    } else {
        let url;
        try {
            url = new URL(clientTargetUrl2);
        } catch (_) {
            alert("Invalid Url Provided")
            return false;
        }
        // return url.protocol === "http:" || url.protocol === "https:";
        // return true;
    }



    if (clientAnchorText2 == "") {
        alert("Anchor Text Can Not Br Blank!");
        return false;
    }
}