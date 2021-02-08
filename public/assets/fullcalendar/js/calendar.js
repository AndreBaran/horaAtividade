
document.addEventListener('DOMContentLoaded', function () {

  /* initialize the external events
  -----------------------------------------------------------------*/

 // var containerEl = document.getElementById('external-events-list');
//  new FullCalendar.Draggable(containerEl, {
//    itemSelector: '.fc-event',
//    eventData: function (eventEl) {
//      return {
//        title: eventEl.innerText.trim()
 //     }
 //   }
 // });

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
      //right: 'timeGridWeek'

      right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    },
    locale: 'pt-br',
    navLinks: true,
    eventLimit: false,
    selectable: true,
    height: 550,
    initialView: 'timeGridWeek',
    // allDayDefault: true,
    hiddenDays: [0, 6],
    businessHours: {
      // days of week. an array of zero-based day of week integers (0=Sunday)
      daysOfWeek: [1, 2, 3, 4, 5], // Monday - Thursday

      startTime: '08:00', // a start time (10am in this example)
      endTime: '18:00', // an end time (6pm in this example)
    },
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
        title: element.event.title,
        end: end
      }
      console.log(routeAtividades('routeAtividadeUpdate'));
      sendAtividade(routeAtividades('routeAtividadeUpdate'), newElemente);
      // console.log(end);
    },
    eventClick: function (element) {
      console.log(element);
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
        title: element.event.title,
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
    datesSet: function() {
      console.log('ffffffffffffffffffff');
      //console.log(calendar.startTime().toISOString());
      //console.log(calendar.endTime().toISOString());
     // calendar.getDate()
      
      console.log(calendar.getDate().toISOString());
      console.log(calendar.view.activeStart.toISOString());
      console.log(calendar.view.activeEnd.toISOString());
     
     // let start = calendar.view.activeStart.toISOString();//moment(calendar.view.activeStart.toISOString()).format("YYYY-MM-DD HH:mm:ss");
     //let start = moment(calendar.view.activeStart.toISOString());//.format("YYYY-MM-DD HH:mm:ss");
     //let endLastWeek=start.subtract(1, 'd');
     //let startLastWeek=start.subtract(8, 'd');
    // start=start.format("YYYY-MM-DD HH:mm:ss"); 
    // endLastWeek=endLastWeek.format("YYYY-MM-DD HH:mm:ss"); 
//startLastWeek=startLastWeek.format("YYYY-MM-DD HH:mm:ss"); 
      //start=start-7;
     let end = moment(calendar.view.activeEnd.toISOString());
     let start= moment(calendar.view.activeEnd.toISOString());
     let endLastWeek=moment(calendar.view.activeEnd.toISOString());
     let startLastWeek=moment(calendar.view.activeEnd.toISOString());
     start=start.subtract(7, 'd');
     endLastWeek=endLastWeek.subtract(8, 'd');
     startLastWeek=startLastWeek.subtract(14, 'd');
     start=start.format("YYYY-MM-DD HH:mm:ss"); 
     end=end.format("YYYY-MM-DD HH:mm:ss"); 
     endLastWeek=endLastWeek.format("YYYY-MM-DD HH:mm:ss"); 
     startLastWeek=startLastWeek.format("YYYY-MM-DD HH:mm:ss"); 
      $("#divDate input[name='startView']").val(start);

      $("#divDate input[name='startLastView']").val(startLastWeek);
      $("#divDate input[name='endLastView']").val(endLastWeek);

   
      $("#divDate input[name='endView']").val(end);

      console.log(start);
      console.log(end);
      console.log('ffffffffffffffffffff');
    },
    events:routeAtividades('routeLoadAtividades'),
    
  });
  calendar.render();
  //console.log('aaaaaaaaaaaaaaaaaaaaaaa');
  //console.log(calendar.startTime.val);
  //console.log('aaaaaaaaaaaaaaaaaaaaaaa');

});

// console.log(routeAtividades('routeLoadAtividades'));
//console.log('aaa');
//console.log(routeAtividades('routeLoadAtividades'));

//console.log(routeAtividades('routeLoadProfessores'));
//console.log('aaaaaaaaaaaaaaaaaaaaaaa');
//console.log(routeTeste());
//console.log(routeAtividades('routeLoadAtividades'));
//console.log(routeAtividades('routeLoadInfotipos'));
//let rota =routeAtividades('routeLoadInfotipos');
//let teste =getTipoAtividade(routeAtividades('routeLoadInfotipos'),2);
//
//console.log('aaaaaaaaaaaaaaaaaaaaaaa');
//console.log(getTipoAtividade(routeAtividades('routeLoadInfotipos'),2));
//console.log(routeTeste());
///console.log(getTipoAtividade(routeAtividades('routeLoadInfoTipos'),1));
//console.log('bbbbbbbbbbbbb');
//console.log(calendar.events.color);
//console.log('eee');
//console.log('aaaaaaaaaaaaaaaaaaaaaaa');
//console.log(routeAtividades('routeAtividadeWeeks'));
console.log(routeTeste('teste'));
//console.log(calendarEl);
//console.log('aaaaaaaaaaaaaaaaaaaaaaa');