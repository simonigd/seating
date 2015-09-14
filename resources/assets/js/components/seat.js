module.exports ={
	template: require('./seat.html'),

    methods:{
       
        /**
        *  we dropped something on the seat.
        *  just a guest for now.
        **/
        dropHandler: function(type,index){
     
        
            this.$dispatch("seatGuest", index,this.$parent.$index,this.$index);

          

           
        }

    },

	

}