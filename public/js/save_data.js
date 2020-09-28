//const { default: Axios } = require("axios");


function save_data(){
    //console.log('llego a save data');
    const url = 'http://localhost:8000';


    var subject_id = document.getElementById('subject_id').value

    //alert(subject_id);
    // '1';
    var body = document.getElementById('body').value;
    var fromName = document.getElementById('fromName').value;
    var fromEmail = document.getElementById('fromEmail').value;
    var toEmail = document.getElementById('fromEmail').value;
    var dateEmail = document.getElementById('dateEmail').value;    


    var words = 0;
    var score = 0;
    var spamScoreNumber = 0;
    var spamScore = '';


    /**
     * Filter spam for input content
     */
    
    var dictionary = {
      'viagra': 5,
      'oferta': 4,
      'ofertas': 4, 
      'buy': 5,
      'contactanos':3,
      'tarifas': 2,
      'stock':1,
    }

    body.split(' ').forEach(item => {      
      
      Object.entries(dictionary).map( dic =>{
        if (dic[0] == item) {          
          score = score + dic[1];
          words=words+1;
        }        
      });     
      });

    spamScoreNumber = score / words;

    console.log(spamScoreNumber);

    if (spamScoreNumber >= 2.5) {
        spamScore = 'spam'
    } else {
        spamScore = 'ok'
    }
    
    /**
     * // End. Filter spam for input content
     */



    axios({
        method: 'POST',
        url: `${url}/api/create_message`,
        data: {
            subject_id: subject_id,
            body:body,
            fromName: fromName,
            fromEmail: fromEmail,
            toEmail: toEmail,
            dateEmail: dateEmail,
            spamScore: spamScore
        }

    })
    .then(()=>{
        alert('Los datos fueron guardados');
    })

}