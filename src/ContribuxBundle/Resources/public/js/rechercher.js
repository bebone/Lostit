$(document).ready(function () {
            var url = "";
            //$("#target-content").load("{{ path('projets_ajax',{'page': 1}) }}");

            $(document).on("click", ".pagination li", function (e) {
                e.preventDefault();
                $("#target-content").html('Patientez...');
                $("#target-content").load(url + $(this).attr('id'));
            });
            $(document).on("click", ".btn-nom", function (e) {
                e.preventDefault();
                $(".pagination li").removeClass('active');
                $("#target-content").html('Patientez...');
                if ($('input[id="recherche-nom"]').val() == "") {
                    url = "projets_ajax/";
                    $("#target-content").load(url + "1", function () {
                    }).hide().fadeIn("slow");
                }
                else {
                    url = "recherche_nom_ajax/" + $('input[id="recherche-nom"]').val() + "/";
                    $("#target-content").load(url + "1", function () {
                    }).hide().fadeIn("slow");
                }
            });
            $(document).keypress(function (e) {
                if (e.which == 13) {
                    e.preventDefault();
                    $(".pagination li").removeClass('active');
                    $("#target-content").html('Patientez...');
                    if ($('input[id="recherche-nom"]').val() == "") {
                        url = "projets_ajax/";
                        $("#target-content").load(url + "1", function () {
                        }).hide().fadeIn("slow");
                    }
                    else {
                        url = "recherche_nom_ajax/" + $('input[id="recherche-nom"]').val() + "/";
                        $("#target-content").load(url + "1", function () {
                        }).hide().fadeIn("slow");
                    }
                }
            });
            $(document).on("click", ".recherche-langage", function (e) {
                e.preventDefault();
                $(".pagination li").removeClass('active');
                $("#target-content").html('Patientez...');

                url = "recherche_langage_ajax/" + $(this).attr('id') + "/";
                $("#target-content").load(url + "1", function () {
                }).hide().fadeIn("slow");

            });

        });

