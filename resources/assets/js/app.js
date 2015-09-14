'use strict';

/**
* App acts as the overall controller.
**/

var Vue = require('vue');


//we need drag and drop so require it here
Vue.use(require('vue-dnd'));


//main application data this is accessible in each vue instance 

var data={

  name: 'My Event',
  tables: [],
  rooms:[],
  guests:[
           {
             name:'simon',
             table:0,
             seat:0,
            },
            {
              name:'sophie',
              table:0,
              seat:0,
            }
   ],
 
};



var tools = new Vue({
  
  el: '#tools',
  data:{
      tables:[
      {
        type: 'table',
        seats: 8
      },
      {
        type: 'table',
        seats: 6
      }
      ]
  },

  methods:{

    clickToolHandler: function(tool){
    
      room.addTable(tool);
    
    },
    dropHandler: function(id,index){
          alert('Dropped a  table');
       }
    },
})


var room = new Vue({
  
  el: '#plan',
  
  data: data, 
  
  components:{
     'table': require('./components/table.js'),
     'guest': require('./components/guest.js'),
  },

  created: function()
  {
    /**
    * some events which will be called from child components.
    * we let the application control as much as possible.
    **/
    this.$on("seatGuest", this.seatGuest);
    //.. needd to specify all events here
    this.$on("moveTable",this.moveTable);
 
  },

  methods:{

    /*
    * seat a guest on a given table and seat
    */
    seatGuest: function(guestID,tableID,seatID){

      var table = data.tables[tableID];
      var guest = data.guests[guestID];


      if(guest.seated){
        return false;
      }
     
   
      //do some checks to ensure guest is not already seated or seat is not occupied
      if(table && guest) {

        //if guest is seated then 

         table.seats[seatID].guest = guest.name;
         guest.seated = true;
         guest.table = tableID;
         guest.seat = seatID;
         console.log(guest);

         return true;
      }

      return false;
        
    },
    /*
    * moves the table to a givem point within the room
    * specified by x,y 
    */
    moveTable: function(table,x,y){


      console.log(this.$el);

      /*
      * move to new position
      * specified by x,y
      */


      console.log('calculate');
      table.$el.style.left = x+"px";
      table.$el.style.top = y+"px";
    },

    addTable: function(table){

      var table = data.tables[data.tables.push({name:table.type,noSeats:table.seats,seats:[]})-1];
           
     },

    dropHandler: function(id,index){
     
      alert('Dropped a blooming guest');
                 //return;
       }
  },
  computed:{

    noTables: function(table){
      return data.tables.length;
    },

    noSeats: function(){

      var seats= 0;
     
      for(var i=0; i < data.tables.length;i++){
        seats+=data.tables[i].noSeats;
      }
      return seats;
    }

  }


})