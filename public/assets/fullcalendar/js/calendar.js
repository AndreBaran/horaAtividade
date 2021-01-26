
document.addEventListener('DOMContentLoaded', function () {

  /* initialize the external events
  -----------------------------------------------------------------*/

  var containerEl = document.getElementById('external-events-list');
  new FullCalendar.Draggable(containerEl, {
    itemSelector: '.fc-event',
    eventData: function (eventEl) {
      return {
        title: eventEl.innerText.trim()
      }
    }
  });

  //// the individual way to do it
  // var containerEl = document.getElementById('external-events-list');
  // var eventEls = Array.prototype.slice.call(
  //   containerEl.querySelectorAll('.fc-event')
  // );
  // eventEls.forEach(function(eventEl) {
  //   new FullCalendar.Draggable(eventEl, {
  //     eventData: {
  //       title: eventEl.innerText.trim(),
  //     }
  //   });
  // });

  /* initialize the calendar
  -----------------------------------------------------------------*/

  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'timeGridWeek'
      //right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    },
    locale: 'pt-br',
    navLinks: true,
    eventLimit: true,
    selectable: true,
    editable: true,
    droppable: true, // this allows things to be dropped onto the calenda
    drop: function (arg) {
      // is the "remove after drop" checkbox checked?
      if (document.getElementById('drop-remove').checked) {
        // if so, remove the element from the "Draggable Events" list
        arg.draggedEl.parentNode.removeChild(arg.draggedEl);
      }
    },
    eventDrop: function (element) {
      let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
      let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

      let newElemente = {
        _method: 'PUT',
        id: element.event.id,
        start: start,
        end: end
      }
      console.log(routeAtividades('routeAtividadeUpdate'));
      sendAtividade(routeAtividades('routeAtividadeUpdate'), newElemente);
      // console.log(end);
    },
    eventClick: function (element) {
      clearMessages('.message');
      resetForm("#formEvent");
      $("#modalCalendar").modal('show');
      $("#modalCalendar #titleModal").text('Alterar Atividade');
      $("#modalCalendar button.deleteEvent").css("display", "flex");
      console.log(element);

      let id = element.event.id;
      $("#modalCalendar input[name='id']").val(id);

      let title = element.event.title;
      $("#modalCalendar input[name='title']").val(title);

      let start = moment(element.event.start).format("DD/MM/YYYY HH:mm:ss");;
      $("#modalCalendar input[name='start']").val(start);

      let end = moment(element.event.end).format("DD/MM/YYYY HH:mm:ss");;
      $("#modalCalendar input[name='end']").val(end);

      let color = element.event.backgroundColor;
      $("#modalCalendar input[name='color']").val(color);

      //$("#modalCalendar").modal({
      //  show: true
      //});
    },
    eventResize: function (element) {
      //alert('event Click');
      let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
      let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

      let newElemente = {
        _method: 'PUT',
        id: element.event.id,
        start: start,
        end: end
      }
      console.log(routeAtividades('routeAtividadeUpdate'));
      sendAtividade(routeAtividades('routeAtividadeUpdate'), newElemente);
    },
    select: function (element) {
      clearMessages('.message');
      resetForm("#formEvent");
      $("#modalCalendar").modal('show');
      $("#modalCalendar #titleModal").text('Adicionar Atividade');
      $("#modalCalendar button.deleteEvent").css("display", "none");

      let start = moment(element.start).format("DD/MM/YYYY HH:mm:ss");
      $("#modalCalendar input[name='start']").val(start);

      let end = moment(element.end).format("DD/MM/YYYY HH:mm:ss");
      $("#modalCalendar input[name='end']").val(end);

      $("#modalCalendar input[name='color']").val("#3788D8");

      calendar.unselect();
    },
    events: routeAtividades('routeLoadAtividades'),
  });
  calendar.render();

});

// console.log(routeAtividades('routeLoadAtividades'));
console.log('aaa');
console.log(routeAtividades('routeLoadAtividades'));
  //console.log('eee');