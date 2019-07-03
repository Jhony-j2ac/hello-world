(function(){
	let lol = "hola";
	document.getElementById("new").addEventListener("click", ClosureVariable, true);

	var prueba;

	
	function ClosureVariable(){
		prueba = clase();

		document.getElementById("sum").addEventListener("click", prueba.add, false);
		document.getElementById("rest").addEventListener("click", prueba.less, false);
		document.getElementById("end").addEventListener("mouseover", prueba.sets(prompt("mensahe", "mensaje")), false);
		document.getElementById("now").addEventListener("click", actual(prueba), false);
		//document.getElementById("all").addEventListener("mouseover", , false);

		alert(lol);
	};

	function actual(activo ){
		console.log(activo.now()) ;
	}

	function clase(){
		let _name ;
		let _number = 0 ;

		function sets(val){
			_name = val ;
		}

		function add(){
			_number ++;
		}

		function less(){
			_number --;
		}

		function end(){

		}

		function now(){
			return _name + " and " + _number;
		}

		function all(){

		}

		return {
			add: add,
			less: less,
			now: now,
			sets: sets 
		}
	}

})();


