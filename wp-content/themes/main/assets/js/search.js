(function ($) {
    $(document).ready(function (){
        $(".action-search select.achat, .action-search select.lieu").SumoSelect({
            triggerChangeCombined: true,
            forceCustomRendering: true
        });
        $(".action-search select.type-de-bien").SumoSelect({
            triggerChangeCombined: true,
            forceCustomRendering: true,
            placeholder: 'Type de bien'
        });
        $(".action-search select.nb-de-pieces").SumoSelect({
            triggerChangeCombined: true,
            forceCustomRendering: true,
            placeholder: 'Nb de pièces'
        });
        $(".action-search select.chambres").SumoSelect({
            triggerChangeCombined: true,
            forceCustomRendering: true,
            placeholder: 'Nb de chambres'
        });
        $(".action-search select.surface").SumoSelect({
            triggerChangeCombined: true,
            forceCustomRendering: true,
            placeholder: 'Nb de pièces'
        });
        $(".action-search select.commodites").SumoSelect({
            triggerChangeCombined: true,
            forceCustomRendering: true,
            placeholder: 'Commodités'
        });
        $(".action-search select.cuisine").SumoSelect({
            triggerChangeCombined: true,
            forceCustomRendering: true,
            placeholder: 'Cuisine'
        });
        $(".action-search select.chauffage").SumoSelect({
            triggerChangeCombined: true,
            forceCustomRendering: true,
            placeholder: 'Chauffage'
        });
        $(".action-search select.exposition").SumoSelect({
            triggerChangeCombined: true,
            forceCustomRendering: true,
            placeholder: 'Exposition'
        });
        $(".action-search select.autres-pieces").SumoSelect({
            triggerChangeCombined: true,
            forceCustomRendering: true,
            placeholder: 'Autres pièces'
        });
        $(".action-search select.surface-terrain").SumoSelect({
            triggerChangeCombined: true,
            forceCustomRendering: true,
            placeholder: 'Nb de pièces'
        });
        $(".search-title select").SumoSelect({
            triggerChangeCombined: true,
            forceCustomRendering: true,
            placeholder: 'Trier par'
        });

        //btn-budget
        $('.btn-budget').click(function (e) {
            if ($('.action-search .type-search .SumoSelect').hasClass('open')) {
                $('.action-search .type-search .SumoSelect').removeClass('open');
            }

            setTimeout(function() {
                e.preventDefault();
                e.stopPropagation();
                $('.frame-budget').slideToggle(300);
                $(this).toggleClass('active');
            }, 10);
        });
        $('.frame-budget').click(function(e){
            e.stopPropagation();
        });

        $(document).click(function(e) {
            if( !$('.frame-budget').is( e.target ) )
            {
                $('.frame-budget').slideUp(300);
                $('.btn-budget').removeClass('active');
            }
        });

        //btn-surface
        $('.btn-surface').click(function (e) {
            if ($('.action-search .type-search .SumoSelect').hasClass('open')) {
                $('.action-search .type-search .SumoSelect').removeClass('open');
            }

            setTimeout(function() {
                e.preventDefault();
                e.stopPropagation();
                $('.frame-surface').slideToggle(300);
                $(this).toggleClass('active');
            }, 10);
        });

        $('.frame-surface').click(function(e){
            e.stopPropagation();
        });
        $(document).click(function(e) {
            if( !$('.frame-surface').is( e.target ) )
                $('.frame-surface').slideUp(300);
            $('.btn-surface').removeClass('active');
        });

        //btn-surface-terrain
        $('.btn-surface-terrain').click(function (e) {
            if ($('.action-search .type-search .SumoSelect').hasClass('open')) {
                $('.action-search .type-search .SumoSelect').removeClass('open');
            }

            setTimeout(function() {
                e.preventDefault();
                e.stopPropagation();
                $('.frame-surface-terrain').slideToggle(300);
                $(this).toggleClass('active');
            }, 10);
        });

        $('.frame-surface-terrain').click(function(e){
            e.stopPropagation();
        });
        $(document).click(function(e) {
            if( !$('.frame-surface-terrain').is( e.target ) )
                $('.frame-surface-terrain').slideUp(300);
            $('.btn-surface-terrain').removeClass('active');
        });


        $( ".btn-budget" ).click(function() {
            $( ".frame-budget .frame-budget__left .input-price" ).focus();
        });
        $( ".btn-surface" ).click(function() {
            $( ".frame-surface .frame-surface__left .input-price" ).focus();
        });
        $( ".btn-surface-terrain" ).click(function() {
            $( ".frame-surface-terrain .input-price" ).focus();
        });

    });
})(jQuery);