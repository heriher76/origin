@extends('layouts.app')

@section('title', 'Kolom Opini | Origin Magazine Indonesia')

@section('contents')
<div class="col-md-12 col-sm-12 col-xs-12">
	<center><h2>Kolom Opini</h2></center>
	<hr>
	<section id="pinBoot">
	@foreach($opinions as $opinion)
	  <article class="white-panel">
	  	<label for="">{{ $opinion->author }}</label>
	    <h4><a href="#">{{ $opinion->title }}</a></h4>
	    <p>{!! $opinion->description !!}</p>
	  </article>
	@endforeach
	</section>
	<div class="col-md-12 text-center">
		{{ $opinions->links() }}
	</div>

	<hr>

	</div>
</div>
@stop

@section('styles')
<style type="text/css">
	/*
	Ref:
	Thanks to:
	http://www.jqueryscript.net/layout/Simple-jQuery-Plugin-To-Create-Pinterest-Style-Grid-Layout-Pinterest-Grid.html
	*/

	#pinBoot {
	  position: relative;
	  max-width: 100%;
	  width: 100%;
	}
	img {
	  width: 100%;
	  max-width: 100%;
	  height: auto;
	}
	.white-panel {
	  position: absolute;
	  background: white;
	  box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3);
	  padding: 10px;
	}
	/*
	stylize any heading tags withing white-panel below
	*/

	.white-panel h1 {
	  font-size: 1em;
	}
	.white-panel h1 a {
	  color: #A92733;
	}
	.white-panel:hover {
	  box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);
	  margin-top: -5px;
	  -webkit-transition: all 0.3s ease-in-out;
	  -moz-transition: all 0.3s ease-in-out;
	  -o-transition: all 0.3s ease-in-out;
	  transition: all 0.3s ease-in-out;
	}
</style>
@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
	$('#pinBoot').pinterest_grid({
	no_columns: 4,
	padding_x: 10,
	padding_y: 10,
	margin_bottom: 50,
	single_column_breakpoint: 700
	});
	});

	;(function ($, window, document, undefined) {
	    var pluginName = 'pinterest_grid',
	        defaults = {
	            padding_x: 10,
	            padding_y: 10,
	            no_columns: 3,
	            margin_bottom: 50,
	            single_column_breakpoint: 700
	        },
	        columns,
	        $article,
	        article_width;

	    function Plugin(element, options) {
	        this.element = element;
	        this.options = $.extend({}, defaults, options) ;
	        this._defaults = defaults;
	        this._name = pluginName;
	        this.init();
	    }

	    Plugin.prototype.init = function () {
	        var self = this,
	            resize_finish;

	        $(window).resize(function() {
	            clearTimeout(resize_finish);
	            resize_finish = setTimeout( function () {
	                self.make_layout_change(self);
	            }, 11);
	        });

	        self.make_layout_change(self);

	        setTimeout(function() {
	            $(window).resize();
	        }, 500);
	    };

	    Plugin.prototype.calculate = function (single_column_mode) {
	        var self = this,
	            tallest = 0,
	            row = 0,
	            $container = $(this.element),
	            container_width = $container.width();
	            $article = $(this.element).children();

	        if(single_column_mode === true) {
	            article_width = $container.width() - self.options.padding_x;
	        } else {
	            article_width = ($container.width() - self.options.padding_x * self.options.no_columns) / self.options.no_columns;
	        }

	        $article.each(function() {
	            $(this).css('width', article_width);
	        });

	        columns = self.options.no_columns;

	        $article.each(function(index) {
	            var current_column,
	                left_out = 0,
	                top = 0,
	                $this = $(this),
	                prevAll = $this.prevAll(),
	                tallest = 0;

	            if(single_column_mode === false) {
	                current_column = (index % columns);
	            } else {
	                current_column = 0;
	            }

	            for(var t = 0; t < columns; t++) {
	                $this.removeClass('c'+t);
	            }

	            if(index % columns === 0) {
	                row++;
	            }

	            $this.addClass('c' + current_column);
	            $this.addClass('r' + row);

	            prevAll.each(function(index) {
	                if($(this).hasClass('c' + current_column)) {
	                    top += $(this).outerHeight() + self.options.padding_y;
	                }
	            });

	            if(single_column_mode === true) {
	                left_out = 0;
	            } else {
	                left_out = (index % columns) * (article_width + self.options.padding_x);
	            }

	            $this.css({
	                'left': left_out,
	                'top' : top
	            });
	        });

	        this.tallest($container);
	        $(window).resize();
	    };

	    Plugin.prototype.tallest = function (_container) {
	        var column_heights = [],
	            largest = 0;

	        for(var z = 0; z < columns; z++) {
	            var temp_height = 0;
	            _container.find('.c'+z).each(function() {
	                temp_height += $(this).outerHeight();
	            });
	            column_heights[z] = temp_height;
	        }

	        largest = Math.max.apply(Math, column_heights);
	        _container.css('height', largest + (this.options.padding_y + this.options.margin_bottom));
	    };

	    Plugin.prototype.make_layout_change = function (_self) {
	        if($(window).width() < _self.options.single_column_breakpoint) {
	            _self.calculate(true);
	        } else {
	            _self.calculate(false);
	        }
	    };

	    $.fn[pluginName] = function (options) {
	        return this.each(function () {
	            if (!$.data(this, 'plugin_' + pluginName)) {
	                $.data(this, 'plugin_' + pluginName,
	                new Plugin(this, options));
	            }
	        });
	    }

	})(jQuery, window, document);
</script>
@stop