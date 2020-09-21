var nombre = "hola";
const video = document.getElementById('video')
var contador = 0;
var perfil = false;
var boca = false;
var normal = false;

var primera_vez_perfil = true;
var primera_vez_boca = true;

Promise.all([
  faceapi.nets.tinyFaceDetector.loadFromUri('../login/models'),
  faceapi.nets.faceLandmark68Net.loadFromUri('../login/models'),
  faceapi.nets.faceRecognitionNet.loadFromUri('../login/models'),
  faceapi.nets.ssdMobilenetv1.loadFromUri('../login/models'),
]).then(startVideo)

function startVideo() {
  navigator.getUserMedia(
    { video: {} },
    stream => video.srcObject = stream,
    err => console.error(err)
  )
}

video.addEventListener('play', () => {
  const canvas = faceapi.createCanvasFromMedia(video)
  document.body.append(canvas)
  const displaySize = { width: video.width, height: video.height }
  faceapi.matchDimensions(canvas, displaySize)

  let labeledFaceDescriptors
  (async () => {
    labeledFaceDescriptors = await loadLabeledImages()
  })()

  setInterval(async () => {
    const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceDescriptors()
    const resizedDetections = faceapi.resizeResults(detections, displaySize)
    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
    
    if (labeledFaceDescriptors) {
      const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6)
      const results = resizedDetections.map(d => faceMatcher.findBestMatch(d.descriptor))
      // const usuario = "alejandro_izquierda"
      // console.log(contador)
      // if(results[0]){
      //   if(results[0].label == usuario){
      //     console.log("esta persona es "+ usuario)
      //   }else{
      //     console.log("esta persona no es "+ usuario)
      //   }
      // }

      if(contador>10 && contador<20){
        if(primera_vez_perfil) {
          alert("por favor póngase de perfil")
          primera_vez_perfil = false
        }else if(results[0] && !perfil){
          if(results[0].label=="betsy_perfil"){
            perfil = true
            alert("mirada de perfil de manera exitosa")
          }
        }

      }else if(contador>=20 && contador <30){
        if(primera_vez_boca) {
          alert("por favor abra la boca")
          primera_vez_boca = false
        }else if(results[0] && !boca){
          if(results[0].label=="betsy_boca"){
            boca = true
            alert("abrió la boca exitosamente")
          }
        }
      }

      results.forEach((result, i) => {
        const box = resizedDetections[i].detection.box
        const drawBox = new faceapi.draw.DrawBox(box, { label: result.toString() })
        faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
        drawBox.draw(canvas)
      })
    }
    contador++
    console.log("el valor de perfil es: "+perfil)
    console.log("el valor de boca es " + boca)
  }, 2000)
 
})

function loadLabeledImages() {
  //const labels = ['alejandro',"alejandro_izquierda","alejandro_derecha2"]
  const labels = ['betsy',"betsy_perfil","betsy_boca"] 
  return Promise.all(
    labels.map(async label => {
      const descriptions = []
      for (let i = 1; i <= 1; i++) {
          //const img = await faceapi.fetchImage(`images/${label}/${label}`+`_izquierda.jpg`)
          const img = await faceapi.fetchImage(`images/Betsy/${label}.jpg`)
          const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
          descriptions.push(detections.descriptor)
          return new faceapi.LabeledFaceDescriptors(label, descriptions)
      }

    })
  )
}



/*
function loadLabeledImages() {
  const labels = ['frank','juanca','alejandro','betsy','ojoscerrados','perfil_pequenio']
  return Promise.all(
    labels.map(async label => {
      console.log(label)
      const descriptions = []
      for (let i = 1; i <= 1; i++) {
        const img = await faceapi.fetchImage(`${label}.jpg`)
        const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
        descriptions.push(detections.descriptor)
      }

      return new faceapi.LabeledFaceDescriptors(label, descriptions)
    })
  )
}
*/