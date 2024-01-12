function fibonacci(n: number): number {
  if (n == 1 || n == 0) {
    return n;
  } else {
    return fibonacci(n - 1) + fibonacci(n - 2);
  }
}

console.log(fibonacci(10));

function Ackerman(m: number, n: number): number {
  if (m == 0) {
    return n += 1;
  } else if (m > 0 && n == 0) {
    return Ackerman(m - 1, 1);
  } else if (m > 0 && n > 0) {
    return Ackerman(m - 1, Ackerman(m, n - 1));
  } else {
    throw new Error("invalide");
  }
}

console.log(Ackerman(4, 1));
