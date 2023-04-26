const readURL = (input) => {
    var element = document.getElementById("content-text");
    var orDivider = document.getElementById("or-divider");

    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
            $('.content-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();

            element.style.display = "none";
            orDivider.style.display = "none";

            // document.getElementById("content-text").remove();

            $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function removeUpload() {
    // remove uploded file
    let contentFile = document.getElementsByName("content-file");
    contentFile[0].value = '';

    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    var element = document.getElementById("content-text");
    var orDivider = document.getElementById("or-divider");

    element.style.display = "block";
    orDivider.style.display = "block";

    $('.file-upload-content').hide();
    $('.content-upload-wrap').show();
}

// drag and drop events
$('.content-upload-wrap').bind('dragover', function() {
    $('.content-upload-wrap').addClass('image-dropping');
});
$('.content-upload-wrap').bind('dragleave', function() {
    $('.content-upload-wrap').removeClass('image-dropping');
});

const checkContent = (t) => {
    var contentUpload = document.querySelector(".content-upload");
    var orDivider = document.getElementById("or-divider");

    if (t.value.length > 0) {
        contentUpload.style.display = "none";
        orDivider.style.display = "none";
    } else {
        contentUpload.style.display = "block";
        orDivider.style.display = "block";
    }
}

// const addHyperLink = (sectionId) => {
//     let sec = document.getElementById(sectionId);
//     let newsec = `
//                 <div class="row">
//                     <div class="col-md-5 mb-2">
//                         <input type="text" class="form-control" placeholder="Enter the anchor text that you have included in above content" name="clientAnchorText1[]">
//                     </div>

//                     <div class="col-md-5 mb-2">
//                         <input type="text" class="form-control" aria-describedby="Target Url" placeholder="Enter the URL that you have included in your content" name="clientTargetUrl1[]">
//                     </div>
//                     <div class="col-md-2 col-md-2 d-flex align-items-center justify-content-evenly mb-2">
//                         <span class="badge text-bg-danger cursor_pointer" onclick="removeHyperLink(this)">Remove</span>
//                         <span class="badge text-bg-primary cursor_pointer" onclick="addHyperLink('${sectionId}')">Add New</span>
//                     </div>
//                 </div>`;
//     sec.insertAdjacentHTML('beforeend', newsec);
// }

// const removeHyperLink = (t) => {
//     let existingNodes = t.parentNode.parentNode.parentNode.children.length;
//     if (existingNodes == 2 || existingNodes < 2) {
//         alert(`You Have to add minimum 1 link`);
//     } else {
//         t.parentNode.parentNode.remove();
//     }
// }