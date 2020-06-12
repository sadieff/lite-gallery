jQuery(function ($) {

    $(document).ready(function(){

        var gallery = new Gallery({
            galleryClass: ".lite-gallery",
            tabTitleClass: ".lite-gallery_title",
            contentClass: ".lite-gallery_box",
            viewClass: ".lite-gallery_view",
            imageContainer: ".lite-gallery_item",
            loadingClass: "loading",
            moreButtonClass: '.lite-gallery_show-hidden',
            galleryWrapperClass: '.lite-gallery_wrapper'
        });

    });

    class Gallery {

        constructor(params)
        {
            this.opt = params;
            var that = this;

            that.startgallery($(params.tabTitleClass).filter( ':first' ));

            $(params.tabTitleClass).on('click', function(){
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                $(params.contentClass).each(function(){
                    $(this).css('display', 'none');
                });

                $('[data-id='+$(this).data('target')+']').fadeIn(500);

                that.openimages($(this).data('target'));
            });

            $(document).on('click', params.imageContainer, function(e){

                let src = $(this).data('view');
                let imageWrapper = $(this).closest(params.contentClass).find(params.viewClass);

                if($('body').width() > 768){
                    imageWrapper.find('a').remove();
                    imageWrapper.append('<a data-fancybox href="'+src+'"><img src="'+src+'" alt=""></a>');
                }
                else {
                    $.fancybox.open({
                        src: src,
                        type: 'image',
                        opts: {}
                    });
                }

            });

            $(document).on('click', params.moreButtonClass, function(e){
                $(this).prev(params.galleryWrapperClass).toggleClass('active');
            });
        }

        openimages(target)
        {
            $('[data-id='+target+']').find(this.opt.imageContainer).each(function(){
                var image = $(this).find('img');
                var src = image.data('src');
                image.attr('src', src);
            });
        }

        startgallery(element)
        {

            element.addClass("active");
            let target = element.data('target');
            $('[data-id='+target+']').fadeIn(500);
            this.openimages(target);

            $(this.opt.galleryClass).removeClass(this.opt.loadingClass);

        }

    }

});