module.exports ={

    template: require('./guest.html'),

    props: [],
    
    created : function(){
  
        /*
        * start with guest not seated at any table
        */
        this.seated = false;
        this.table = null;
        this.seat = null;
    
       
    },
	methods:{

        clickHandler: function(){

            //....

        },

		dragStart: function(){
		
            console.log('start guest');
		},

		dragEnd: function(e){

			console.log('end guest');

		},

		moveTo: function(x,y){
	       
           console.log('move to '+x+', '+y);
			//e.target.style.left = x+"px";

		},
		
    }

}