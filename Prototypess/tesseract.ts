import { createWorker } from "tesseract.js";

createWorker()
  .then((worker) => {
    worker.recognize('https://img.over-blog-kiwi.com/0/54/84/28/20160223/ob_f0bd8b_dialogue-1-jpg')
      .then(({ data: { text } }) => {
        console.log(text);
        worker.terminate();
      });
  });