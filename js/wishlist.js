function addWishlist(blogId, t) {

    var url = "wishlistDataAdd.php?BlogId=" + escape(blogId);
    request.open('GET', url, true);

    //set up a function to the server when its done
    request.onreadystatechange = getDescResPersonal;

    request.send(null);
    let action = document.getElementById(`action-${blogId}`);

    action.innerHTML = `<a href="javascript:void()" class="fas fa-heart text-danger" style="color:red" title="Remove this Blog Wishlist"
                            onclick="RemoveWishlist(${blogId})">
                        </a>
                        <a href="order-now.php?id=${blogId}" class="badge text-bg-success">
                            <span>
                                <i class="fas fa-shopping-bag"></i>
                            </span>
                            Buy
                        </a>`;

}


function getDescResPersonal() {
    // alert(t.classList.remove(''));
    if (request.readyState == 4) {

        if (request.status == 200) {
            var xmlResponse = request.responseText;
            if (xmlResponse.includes('success')) {

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Added to wishlist',
                    showConfirmButton: false,
                    timer: 1500
                })

            } else if (xmlResponse.includes('success')) {

                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Failed to add Wishlist',
                    showConfirmButton: false,
                    timer: 1500
                })

            } else if (xmlResponse.includes('exists')) {

                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'This blog is already exists in your wishlist.',
                    showConfirmButton: false,
                    timer: 1500
                })

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="contact.php">Why do I have this issue?</a>'
                })

            }
            document.getElementById('AddRemoveMessage').style.display = "block";
            return true;


        } else if (request.status == 404) {
            alert("Request page doesn't exist");
        } else if (request.status == 403) {
            alert("Request page doesn't exist");
        } else {
            alert("Error: Status Code is " + request.statusText);
        }
    }
} //eof




function RemoveWishlist(blogId, t) {

    var url = "wishlistDataRemove.php?BlogId=" + escape(blogId);
    request.open('GET', url, true);

    //set up a function to the server when its done
    request.onreadystatechange = getDescResDelete;

    //send the request
    request.send(null);
    let action = document.getElementById(`action-${blogId}`);

    action.innerHTML = `<a href="javascript:void()" id="<?php echo $row['blog_id']; ?>" class="far fa-heart text-danger" 
                            title="Add this Blog to Wishlist" onclick="addWishlist(${blogId})">
                        </a>
                        <a href="order-now.php?id=${blogId}" class="badge text-bg-success">
                            <span>
                                <i class="fas fa-shopping-bag"></i>
                            </span>
                            Buy
                        </a>`;
}


function getDescResDelete() {
    //alert("HERE");
    if (request.readyState == 4) {

        if (request.status == 200) {
            var xmlResponse = request.responseText;
            if (xmlResponse.includes('removed')) {

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Removed from Wishlist',
                    showConfirmButton: false,
                    timer: 1500
                })

            } else if (xmlResponse.includes('failed')) {

                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Failed to remove from Wishlist',
                    showConfirmButton: false,
                    timer: 1500
                })

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="contact.php">Why do I have this issue?</a>'
                })

            }

            document.getElementById('AddRemoveMessage').style.display = "block";

        } else if (request.status == 404) {
            alert("Request page doesn't exist");
        } else if (request.status == 403) {
            alert("Request page doesn't exist");
        } else {
            alert("Error: Status Code is " + request.statusText);
        }
    }
} //eof