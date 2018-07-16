var dataEventsJSON = []; //ARRAY EVENTS
var dataUsersJSON = []; //ARRAY USERS + EVENTS ATTENDING
var userStorage = window.localStorage.getItem("currentUser"); //$_SESSION["user"];//"pulkit@gmail.com"; //USER LOGGED IN
var userEmail = document.getElementById("userEmail").value;
//var database = JSON.parse(localStorage.getItem("database")); //DATABASE

$(document).ready(function() {
  $('#calendar-events').fullCalendar(funcCalendarEvents());
});

function formatDate() {
  var today = new Date();
  var day = today.getDate();
  var month = today.getMonth()+1;
  var year = today.getFullYear();

  return year + "-" + month + "-" + day;
}

/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "215px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

/*function loadEvents(){

  for (var i = 0; i < database.events.length; i++){
    database.events[i]['level']= "0";
  }
  for (var i = 0; i < database.events.length; i++){
    for (var j = 0; j < database.users[userStorage].events.length; j++){
      var idAndLevel = database.users[userStorage].events[j].split("&");
      if (database.events[i].id == idAndLevel[0]) {
        database.events[i]['level']= '1';
        break;
      }
    }
  }

  return database.events;

}*/

/*function loadLevels(eventFromServer){

  for (var i = 0; i < eventFromServer.length; i++){
    eventFromServer[i]['level']= "0";
  }
  for (var i = 0; i < eventFromServer.length; i++){
    for (var j = 0; j < database.users[userStorage].events.length; j++){
      var idAndLevel = database.users[userStorage].events[j].split("&");
      if (database.events[i].id == idAndLevel[0]) {
        database.events[i]['level']= '1';
        break;
      }
    }
  }

  return database.events;

}*/

/*$("#getusers").on('click', function(){ 
  console.log("aqui");
      $.ajax({ method: "POST", url: "loadUserEvents.php", })
         
        .done(function( data ) { 
          var result = $.parseJSON(data); 

          var string = '<table><tr><th>#</th><th>Name</th><th>Email</th><tr>';
 
       /* from result create a string of data and append to the div /
      
        $.each( result, function( key, value ) { 
             string += '<tr><td>'+value['user'] + "</td><td> " + value['event']+'</td> <td> '+ value['priority']+'</td> </tr>'; 
        }); 
        
        string += '</table>'; 
 
          $("#records").html(string); 
       }); 
    }); */

function funcCalendarEvents(){
  return {
    header: {
                   left: '',
                   center: 'title',
                   right: 'prev,next'
               },
    defaultView: 'listMonth',
    defaultDate: formatDate(),
    theme: false,
    editable: true, // Don't allow editing of events
    eventLimit: true,
    displayEventTime: true,// Display event time
    events: 'loadEvents.php', 
    eventClick: function(calEvent, jsEvent, view){
      var xmlhttp = new XMLHttpRequest();
      var obj = "";
      var txt = "";

      //Data is coming back here
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          //Carol, Uncomment this below line to see the json data which is coming back
          document.getElementById("data").innerHTML = this.responseText;

          //This is json parsing below
          myObj = JSON.parse(this.responseText);
          //console.log(myObj.length);
          //document.getElementById("data").innerHTML = myObj;
          var eventFromServer = [];
          //for (x in myObj) {
          for(var x = 0; x < myObj.length; x++){
              //loop through the rows here, which are returned from the database
              eventFromServer[x] = myObj[x].event;
              document.getElementById("eventdata").innerHTML = "";
              document.getElementById("eventdata").innerHTML = eventFromServer;

              //alert(eventFromServer2);
          }

          matchEvents(calEvent, eventFromServer);
        }
      };

      //Data to send
      var user = userEmail;
      xmlhttp.open("GET", "loadUserEvents.php?user=" + userStorage, true);
      xmlhttp.send();

    },
    eventRender: function(event, element) {
        if (event.level == '1') {
          element.css("color", "red");
        }else{
          element.css("color", "blue");
        }
    }
  }
}

function refreshJSON(){
  //data.events = (dataEventsJSON);
  //data.users = (dataUsersJSON);
  //window.localStorage.setItem("database", JSON.stringify(data));

}

function matchEvents(caller, eventFromServer){
  var attended = false;
  //var eventDataPulkit = eventFromServer;
  //alert(eventDataPulkit);

  for (var x = 0; x < eventFromServer.length; x++){
    if(caller.id == eventFromServer[x]){
      attended = true;
      break;
    }
  }  

  if (attended){
    alert("You are already attending this event!");
    return;
  }

  $("#modalTitle").text(function(i, oldText){
    return "Choose priority of this event";
  });

  $("#optionId").text(function(i, oldText){
    return caller.id;
  });

  $("#optionTitle").text(function(i, oldText){
    return caller.title;
  });

  $("#myModal").modal();

  $("#btnSaveModal").one( "click",function(){
    var valueLevel;
    var radios = $('input[name=gender]');
    for (var i = 0, length = radios.length; i < length; i++){
       if (radios[i].checked){
          valueLevel = radios[i].value;
          radios[i].checked = false;
          console.log(valueLevel);
          break;
       }
    }

    if (!valueLevel){
      alert("Please, choose an option!");
      return;
    }else{
      //alert("You're good!");
      //return;
      var optionId = $("#optionId").text();
      var optionTitle = $("#optionTitle").text();
      var idAndLevel = optionId + "&" + valueLevel;
      console.log(idAndLevel);

      var xmlhttp = new XMLHttpRequest();
      var obj = "";
      var txt = "";

      //Data is coming back here
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          //Carol, Uncomment this below line to see the json data which is coming back
          document.getElementById("data").innerHTML = this.responseText;

          //This is json parsing below
          myObj = JSON.parse(this.responseText);
          //console.log(myObj.length);
          //document.getElementById("data").innerHTML = myObj;
          var eventFromServer = [];
          //for (x in myObj) {
          for(var x = 0; x < myObj.length; x++){
              //loop through the rows here, which are returned from the database
              eventFromServer[x] = myObj[x].event;
              document.getElementById("eventdata").innerHTML = "";
              document.getElementById("eventdata").innerHTML = eventFromServer;

              //alert(eventFromServer2);
          }
          insertedSuccess(eventFromServer, optionTitle);
        }
      };

      //Data to send
      var user = "carol@gmail.com";
      xmlhttp.open("GET", "insertUserEvent.php?user=" + userStorage + "&event=" + optionId + "&priority=" + valueLevel, true);
      xmlhttp.send();

      //database["users"][uname]["events"].push(id);
      /*database.users[userStorage].events.push(idAndLevel);
      localStorage.setItem("database", JSON.stringify(database));
      alert("Event " + optionTitle + " added with success!");
      $('#calendar-events').fullCalendar('removeEventSources');
      $('#calendar-events').fullCalendar('addEventSource', loadEvents());
      $('#calendar-events').fullCalendar('rerenderEvents');*/
      $('.btn-secondary').click();
      return;
    }
  });

  return;
}

function insertedSuccess(eventFromServer, optionTitle){
  if (eventFromServer){
    alert("Event " + optionTitle + " added with success!");
  }else{
    alert("Problems adding this event");
  }
}