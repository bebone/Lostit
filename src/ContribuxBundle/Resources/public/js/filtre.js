$(document).ready(function () {
        var url = "projets_ajax/";
        $("#target-content").load(url + "1", function(){}).fadeIn("slow");

        $(document).on("click", ".pagination li", function (e) {
            e.preventDefault();
            $("#target-content").html('Patientez...');
            //$(".pagination li").removeClass('active');
            //$(this).addClass('active');
            $("#target-content").load(url + $(this).attr('id'), function(){}).hide().fadeIn("slow");
        });

        $(document).on("click", ".btn-all", function (e) {
            e.preventDefault();
            $(".pagination li").removeClass('active');
            $("#target-content").html('Patientez...');
            url = "projets_ajax/";
            $("#target-content").load(url + "1", function(){}).hide().fadeIn("slow");
            $(this).addClass('active');
        });

        $(document).on("click", ".btn-categorie", function (e) {
            e.preventDefault();
            $(".pagination li").removeClass('active');
            $("#target-content").html('Patientez...');
            url = "recherche_categorie_ajax/" + $(this).attr('id') + "/";
            $("#target-content").load(url + "1", function(){}).hide().fadeIn("slow");
            $(this).addClass('active');
        });

        $(document).on("click", ".btn-aide", function (e) {
            e.preventDefault();
            $(".pagination li").removeClass('active');
            $("#target-content").html('Patientez...');
            //$(".pagination li").removeClass('active');
            //$(this).addClass('active');
            url = "recherche_aide_ajax/" + $(this).attr('id') + "/";
            $("#target-content").load(url + "1", function(){}).hide().fadeIn("slow");
            $(this).addClass('active');
        });
    });


