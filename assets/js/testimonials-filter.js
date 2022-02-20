(function(){

    var filterElements = document.getElementsByClassName("testimonial-select");

    function AIOTestimonials_handleFilterChange(e) {
        var name = e.target.name;
        var value = e.target.value;

        var url = new URL(window.location.href);
        var params = new URLSearchParams(url.search);

        if (value === "") {
            params.delete(name);
        } else {
            params.set(name, value);
        }
        
        url.search = params.toString();
        window.location.href = url.toString();

    }

    if(filterElements.length > 0) {

        for(var i = 0; i < filterElements.length; i ++) {

            filterElements[i].addEventListener("change", AIOTestimonials_handleFilterChange);

        }

    }

})();