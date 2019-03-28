

$(function() {


    $(document).on('submit', '#bookingForm', function (event) {
        event.preventDefault();
        var form = $(this);
        var data = new FormData($(this)[0]);
        var url = form.attr("action");

        $.ajax({
            type: form.attr('method'),
            url: url,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.is-invalid').removeClass('is-invalid');
                if (data.fail) {
                    for (control in data.errors) {
                        $('input[name=' + control + ']').addClass('is-invalid');
                        $('#error-' + control).html(data.errors[control]);
                    }
                } else {
                    $("#bookModal").modal('hide');
                    location.reload();
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert("Error: " + errorThrown);
            }
        });
        return false;
    });

    $('#bookModal').on("show.bs.modal", function (e) {
        $("#room_id").val($(e.relatedTarget).data('id'));
        $("#hotel_id").val($(e.relatedTarget).data('hotel'));
        $("#price").text('$'+$(e.relatedTarget).data('price')+' USD');
        $("#finalTax").text('$'+$(e.relatedTarget).data('tax')+' USD');
        $("#finalFee").text('$'+$(e.relatedTarget).data('fee')+' USD');
        $("#price").val($(e.relatedTarget).data('price'));
        $("#tax").val($(e.relatedTarget).data('tax'));
        $("#fee").val($(e.relatedTarget).data('fee'));
    });

    $(document).on("hidden.bs.modal","#bookModal",function(e){
        $(this).find('form')[0].reset();
        $("#summary").css('display','none');
    });

    $(document).on("change","#time_from,#time_to",function(e){

        let days = getDays($("#time_from").val(),$("#time_to").val());
        if(days > 0) recalculate(days);

    });

    $(document).on("click","#save",function(e){

        e.preventDefault();
        $("form#bookingForm").submit();

    });

    function recalculate(days){


        let tax = parseFloat($("#tax").val());
        let fee = parseFloat($("#fee").val());
        let finalPrice =  parseInt(days) * parseFloat($("#price").val());
        let amount = finalPrice + tax + fee;
        $("#finalTax").text('$'+tax+' USD');
        $("#finalFee").text('$'+fee+' USD');
        $("#finalAmount").text('$'+amount+' USD');

        $("#amount").val(amount);

        $("#summary").css('display','block');


    }

    function getDays(start,end){

        let result = 0;

        if(start !="" && end !=""){
            start = moment(start, "YYYYMMDD");
            end = moment(end, "YYYYMMDD");
            let days = moment
                .duration(moment(end, 'YYYY/MM/DD HH:mm')
                    .diff(moment(start, 'YYYY/MM/DD HH:mm'))
                ).asDays();
            result = days;
        }
        return result;

    }

});
