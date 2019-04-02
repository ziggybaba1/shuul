<style type="text/css">
	.btn:focus, .btn:active, button:focus, button:active {
  outline: none !important;
  box-shadow: none !important;
}

#image-gallery .modal-footer{
  display: block;
}

.thumb{
  margin-top: 15px;
  margin-bottom: 15px;
}
</style>
 @if(\App\Fronttheme::first()->theme=='1')
<div id="load"  style="position: relative;">
  <div class="row">
 @foreach($gallerys as $gala)
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="grid-item">
                  <a href="{{url('')}}/uploads/gallery/{{$gala->image}}" itemprop="contentUrl" data-size="1000x632">
                    <img src="{{url('')}}/uploads/gallery/{{$gala->image}}" itemprop="thumbnail" alt="" />
                  </a>
                  <figcaption itemprop="caption description">{{$gala->caption}}</figcaption>
                </figure>
                @endforeach
                 
              </div>
</div>
<div class="row">
 {{$gallerys->links() }}
</div>
<div id="load"  style="position: relative;">
  <div class="row">
 @elseif(\App\Fronttheme::first()->theme=='2')
                   @foreach($gallerys as $gala)
 <div class="col-md-3 col-padded">
        <a class="gallery" href="#" data-image-id=""  data-toggle="modal" data-title="{{$gala->caption}}"
                   data-image="{{url('')}}/uploads/gallery/{{$gala->image}}"
                   data-target="#image-gallery" style="background-image: url({{url('')}}/uploads/gallery/{{$gala->image}});">
         <img style="display: none;" class="img-thumbnail"
                         src="{{url('')}}/uploads/gallery/{{$gala->image}}"
                         alt="{{$gala->caption}}">
                   </a>
      
      </div>
      @endforeach
      </div>
</div>
<div class="row">
 {{$gallerys->links() }}
</div>
<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript">
 let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.gallery');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

  </script>
                  @endif
 
       


