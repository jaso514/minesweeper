(function ($) {
  $.fn.game = function (options) {
    var config = $.extend({}, options);

    var self = this;

    self.init = function () {
      loadEvents();
    };

    function loadEvents() {
      $('.fn-difficult').change(function(ev){
        var ajx = $.ajax({
          url: '/api/game/' + $(this).val(),
          type: 'GET'
        });

        ajx.done(function(msj){
          renderDraw(msj.data);
        });

      });
      
      $(self).find('.game-board').on("click", '.cell', function(ev){
          cellClick(this);
      });
    }
    
    function renderDraw(data) {
      var cellWidth = (100 / data.cols).toFixed(2);
      $(self).find('.game-info').text("Board with " + data.rows + " rows and " +
          data.cols + " columns, find the " + data.mines + "mines.");
      $(self).find('.game-board').empty();
      for (var i=0; i<data.rows; i++) {
        let row = document.createElement('div');
        row.className = "row";
        for (var j=0; j<data.cols; j++) {
          let cell = document.createElement('div');
          cell.className = "cell";
          cell.style = "width: " + cellWidth + "%";
          cell.innerHTML = "&nbsp;";
          cell.dataset.row = i;
          cell.dataset.col = j;
          $(row).append(cell);
        }
        $(self).find('.game-board').append(row);
      }
    }
    
    function cellClick(cell) {
      $(cell).data('row');
      $(cell).data('col');
      
    }

    self.init();
    return self;
  };
  
  $(document).ready(function(ev){
      $(".game-container").game();
    });
}(jQuery));
