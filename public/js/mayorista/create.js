let $codigo, $state, $city, $colonia;
        let $codigo2, $state2, $city2, $colonia2;        

        $(document).ready(function(){            

            $codigo = $('#code1');
            $codigo2 = $('#code2');
            $state = $('#state1');
            $state2 = $('#state2');
            $city = $('#city1');
            $city2 = $('#city2');
            $colonia = $('#colon1');
            $colonia2 = $('#colon2');

            // Codigo Postal Envió
            $codigo.change(function(){
                const codigoId = $codigo.val();
                const url = `/state/${codigoId}`;
                //console.log(url);
                $.getJSON(url, onStateLoaded);
            });

            // Codigo Postal acturación
            $codigo2.change(function(){
                const codigoId = $codigo2.val();
                const url = `/state/${codigoId}`;
                //console.log(url);
                $.getJSON(url, onStateLoaded2);
            });

            // Ciudades envió
            $city.change(function(){
                const codigoId = $codigo.val();
                const url = `/colonia/${codigoId}`;
                //console.log(url);
                $.getJSON(url, onColoniasLoaded);
            });

            // Ciudades facturación
            $city2.change(function(){
                const codigoId = $codigo.val();
                const url = `/colonia/${codigoId}`;
                //console.log(codigoId);
                $.getJSON(url, onColoniasLoaded2);
            });

        });

        // Carga los estados envió
        function onStateLoaded(states) {
            let htmlOptions = '';            
            states.forEach(state => {
                htmlOptions += `<option value=${state.cestado}>${state.nombreestado}</option>`;
            });            
            $state.html(htmlOptions);
            loadCity(); // Cara las ciudades envió
        }

        // Carga los estados envió
        function onStateLoaded2(states) {
            let htmlOptions = '';            
            states.forEach(state => {
                htmlOptions += `<option value=${state.cestado}>${state.nombreestado}</option>`;
            });            
            $state2.html(htmlOptions);
            loadCity2(); // Cara las ciudades facturación
        }
        
        // Ciudades envió
        function loadCity() {
            const stateId = $state.val();
            console.log(stateId);
            const url = `/city/${stateId}`;
            $.getJSON(url, onCitysLoaded);
            //console.log(url);
        }

        // Ciudades facturación
        function loadCity2() {
            const stateId = $state2.val();
            const url = `/city/${stateId}`;
            $.getJSON(url, onCitysLoaded2);
            //console.log(url);
        }

        // Ciudades  en el combo envió
        function onCitysLoaded(cities) {
            let htmlOptions = '';            
            cities.forEach(city => {
                htmlOptions += `<option value=${city.cmunicipio}>${city.descripcion}</option>`;
            });            
            $city.html(htmlOptions);
            //loadCity(); // side-effect
        }

        // Ciudades  en el combo facturación
        function onCitysLoaded2(cities) {
            let htmlOptions = '';            
            cities.forEach(city => {
                htmlOptions += `<option value=${city.cmunicipio}>${city.descripcion}</option>`;
            });            
            $city2.html(htmlOptions);
        }

        // carga las colonias enviól
        function onColoniasLoaded(colonias) {
            let htmlOptions = '';            
            colonias.forEach(colo => {
                htmlOptions += `<option value=${colo.cnombreasentamiento}>${colo.cnombreasentamiento}</option>`;
            });            
            $colonia.html(htmlOptions);
            //loadCity(); // side-effect
        }

        // carga las colonias facturación
        function onColoniasLoaded2(colonias) {
            let htmlOptions = '';            
            colonias.forEach(colo => {
                htmlOptions += `<option value=${colo.cnombreasentamiento}>${colo.cnombreasentamiento}</option>`;
            });            
            $colonia2.html(htmlOptions);
            //loadCity(); // side-effect
        }