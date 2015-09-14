module.exports ={
	template: require('./table.html'),

     components:{
     'seat': require('./seat.js'),
    },

	props: [],

    created : function(){
  
        this.addSeats(this.noSeats);

    },
	methods:{

		dragStart: function(){
			console.log('start');
		},

		dragEnd: function(e){

			

			this.moveTo(e.x,e.y);
			

		},
		moveTo: function(x,y){
			
            
            this.$dispatch('moveTable',this,x,y);
            

		},
		expand: function(){

			alert('expand');				
		},
        addSeats: function(seats){


            for(var $i=0; $i< seats;$i++){

                this.seats.push({guest:null,table:this.$index});
            }
           // console.log(this.seats);

        },
        /**
        *  we dropped something on the table.
         **/
        dropHandler: function(type,index){
        
            
            this.$dispatch("seatGuest", index,this.$index,0);

           
        }


	}

	

}