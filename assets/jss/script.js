// Adapted https://mikejolley.com/2019/08/02/building-a-cross-browser-compatible-multi-handle-range-slider/

const min = 10000;
const max = 999999;

const state = {
   currentMin: "10000",
   currentMax: "999999",
}

const setHighLowVariables = () => {
   const { currentMin, currentMax } = state;
   
   const low = Math.round( 100 * ( ( currentMin - min ) / ( max - min ) ) );
   const high = Math.round( 100 * ( ( currentMax - min ) / ( max - min ) ) ) + 0.5;
   
   document.body.style.setProperty('--low', `${low}%`);
   document.body.style.setProperty('--high', `${high}%`);
}

const inputs = document.querySelectorAll('.slider input');

inputs.forEach(input => {
   input.addEventListener('change', (event) => {
      const value = input.value;
      
      switch (input.id) {
         case 'max-price':
            state.currentMax = value;
            break;
         case 'min-price':
            state.currentMin = value;
            break;
         default:
            break;            
      }
      
      const labels = input.labels;
      labels[0].textContent = value;
      setHighLowVariables();
   })
});







const min2 = 2000;
const max2 = 2024;

const state2 = {
   currentMin2: "2000",
   currentMax2: "2024",
}

const setHighLowVariables2 = () => {
   const { currentMin2, currentMax2 } = state2;
   
   const low2 = Math.round( 100 * ( ( currentMin2 - min2 ) / ( max2 - min2 ) ) );
   const high2 = Math.round( 100 * ( ( currentMax2 - min2 ) / ( max2 - min2 ) ) ) + 0.5;
   
   document.body.style.setProperty('--low', `${low2}%`);
   document.body.style.setProperty('--high', `${high2}%`);
}



const inputs2 = document.querySelectorAll('.slider2 input');

inputs2.forEach(input2 => {
   input2.addEventListener('change', (event) => {
      const value2 = input2.value;
      
      switch (input2.id) {
         case 'max-year':
            state2.currentMax2 = value2;
            break;
         case 'min-year':
            state2.currentMin2 = value2;
            break;
         default:
            break;            
      }
      
      const labels2 = input2.labels;
      labels2[0].textContent = value2;
      setHighLowVariables2();
   })
});



const min3 = 10;
const max3 = 999;

const state3 = {
   currentMin3: "10",
   currentMax3: "999",
}

const setHighLowVariables3 = () => {
   const { currentMin3, currentMax3 } = state3;
   
   const low3 = Math.round( 100 * ( ( currentMin3 - min3 ) / ( max3 - min3 ) ) );
   const high3 = Math.round( 100 * ( ( currentMax3 - min3 ) / ( max3 - min3 ) ) ) + 0.5;
   
   document.body.style.setProperty('--low', `${low3}%`);
   document.body.style.setProperty('--high', `${high3}%`);
}



const inputs3 = document.querySelectorAll('.slider3 input');

inputs3.forEach(input3 => {
   input3.addEventListener('change', (event) => {
      const value3 = input3.value;
      
      switch (input3.id) {
         case 'max-mileage':
            state3.currentMax3 = value3;
            break;
         case 'min-mileage':
            state3.currentMin3 = value3;
            break;
         default:
            break;            
      }
      
      const labels3 = input3.labels;
      labels3[0].textContent = value3;
      setHighLowVariables3();
   })
});



