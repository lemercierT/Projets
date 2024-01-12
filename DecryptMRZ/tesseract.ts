import { createWorker } from "tesseract.js";

createWorker()
  .then((worker) => {
    worker.recognize('https://qph.cf2.quoracdn.net/main-qimg-4bef5aef54d1a5dedf16ad836e6e2864-pjlq')
      .then(({ data: { text } }) => {
        console.log(text);
        worker.terminate();
      });
  });