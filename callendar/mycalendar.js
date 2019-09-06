
function postData(url = ``, data = {}) {
  // Default options are marked with *
    // var formData = new FormData();
    // formData.append(data);
    return fetch(url, {
        method: "POST", // *GET, POST, PUT, DELETE, etc.
        mode: "cors", // no-cors, cors, *same-origin
        cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
        credentials: "same-origin", // include, *same-origin, omit
        headers: {
            "Content-Type": "application/json",
            // "Content-Type": "application/x-www-form-urlencoded",
        },
        redirect: "follow", // manual, *follow, error
        referrer: "no-referrer", // no-referrer, *client
        body: JSON.stringify(data), // body data type must match "Content-Type" header
    })
    .then(response => response); // parses response to JSON response.json()
}

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid'],
      timeZone: 'Africa/Lagos',
      defaultDate: new Date(),
      editable: true,
      eventLimit: true,
      header: {
        left: 'prev, next, today',
        center: 'title',
        right: 'month, agendaWeek, AgendaDay'
      },
      events: 'load.php',
      selectable: true,
      selectHelper: true,
      select: function ({start, end, allDay}) {
        var title = prompt('Enter event title...');
        start = new Date(start);
        end = new Date(end);
        
        if(title){
            let data = {title: title, start: start, end: end, allDay: allDay}
    
            postData(`insert.php`, data)
            .then(data => {
                calendar.getEvents();
                
                // alert(data + ' Added successfully');
                console.log(data);
            })
            .catch(error => console.error(error));
        }
      }
    });

    calendar.render();
  });