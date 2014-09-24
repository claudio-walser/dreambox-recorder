+function ($) {
  'use strict';

  $(document).on('click.bs.collapse.data-api', '[data-toggle="collapse"]', function (e) {
    var $this   = $(this)
    var target  = $this.attr('data-target')
    var $target = $(target)
    var $panelBody = $('.panel-body', $target);

    

    if ($.trim($panelBody.html()) === 'loading...') {
		
		// checkbox event handler
		$panelBody.on('change', 'input.checkbox-broadcast', function(e) {
		    var action = 'save';
		    if (e.currentTarget.checked !== true) {
		    	action = 'delete';
		    }
		    $.ajax({
				url: "/json.php",
				dataType: 'json',
				data: { 
					controller: '\\DreamboxRecorder\\Controller\\Recording',
					action: action,
					ids: [e.currentTarget.value],
					serviceReferences: [$(e.currentTarget).data('service-reference')],
					endTimes: [$(e.currentTarget).data('end-time')],
					startTimes: [$(e.currentTarget).data('start-time')],
					title: [$(e.currentTarget).data('title')],
					channel: [$(e.currentTarget).data('channel')]
				},
				success: function(response) {
					if (response.success === false) {
						e.currentTarget.checked = false;
						alert(response.data);
					}
					console.log(response);
				}
			});

		    console.log(e.currentTarget.value);
		    console.log(e.currentTarget.checked);
		});
		
		// fetch broadcasts
		$.ajax({
			url: "/json.php",
			dataType: 'json',
			data: { 
				controller: '\\DreamboxRecorder\\Controller\\Dreambox',
				action: 'getBroadcasts',
				service: $this.data('service-reference')
			},
			success: function(response) {
				var html = '';
				var date = '';
				$.each(response.data, function(key, object) {
					var dateObject = new Date(object.timeStart * 1000);
					var dateEndObject = new Date(object.timeEnd * 1000);
					var newDate = dateObject.toLocaleDateString();
					
					// render html
					if (newDate !== date) {
						date = newDate;
						html += '<h1>' + date + '</h1>';
					}
					
					var checked = object.isRecording == 1 ? 'checked="true"' : '';
					var disabled = object.isOver == 1 ? 'disabled' : '';
					html += '<div class="' + disabled + '">';
					html += dateObject.toLocaleTimeString();
					html += ' - ';
					html += dateEndObject.toLocaleTimeString();
					html += '<br />';
					html += '<strong class="title">' + object.title + '</strong>';
					html += '<br /><input ' + checked + ' type="checkbox" class="checkbox-broadcast" name="broadcast" value="' + object.id + '" data-service-reference="' + $this.data('service-reference') + '" data-end-time="' + object.timeEnd + '" data-start-time="' + object.timeStart + '" data-channel="' + object.channel + '" data-title="' + object.title + '" /> aufnehmen';
					
					html += '</div>';
					html += '<hr />';
				});
				
				$panelBody.html(html);
			}
		});
	}
  });

}(jQuery);