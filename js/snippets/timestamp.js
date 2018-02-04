function date_time() {
  return (
    (Data_Now = new Date()),
    (Year = Data_Now.getFullYear()),
    (Month = Data_Now.getMonth()),
    (Day = Data_Now.getDate()),
    (Hour = Data_Now.getHours()),
    (Minutes = Data_Now.getMinutes()),
    (Seconds = Data_Now.getSeconds()),
    (0 === Month
      ? (fMonth = "\u044F\u043D\u0432\u0430\u0440\u044F")
      : 1 === Month
        ? (fMonth = "\u0444\u0435\u0432\u0440\u0430\u043B\u044F")
        : 2 === Month
          ? (fMonth = "\u043C\u0430\u0440\u0442\u0430")
          : 3 === Month
            ? (fMonth = "\u0430\u043F\u0440\u0435\u043B\u044F")
            : 4 === Month
              ? (fMonth = "\u043C\u0430\u044F")
              : 5 === Month
                ? (fMonth = "\u0438\u044E\u043D\u044F")
                : 6 === Month
                  ? (fMonth = "\u0438\u044E\u043B\u044F")
                  : 7 === Month
                    ? (fMonth = "\u0430\u0432\u0433\u0443\u0441\u0442\u0430")
                    : 8 === Month
                      ? (fMonth =
                          "\u0441\u0435\u043D\u0442\u044F\u0431\u0440\u044F")
                      : 9 === Month
                        ? (fMonth =
                            "\u043E\u043A\u0442\u044F\u0431\u0440\u044F")
                        : 10 === Month
                          ? (fMonth = "\u043D\u043E\u044F\u0431\u0440\u044F")
                          : 11 === Month
                            ? (fMonth =
                                "\u0434\u0435\u043A\u0430\u0431\u0440\u044F")
                            : void 0,
    (function() {
      return (
        Day +
        " " +
        fMonth +
        " " +
        Year +
        " \u0433\u043E\u0434\u0430 " +
        Hour +
        ":" +
        Minutes +
        ":" +
        Seconds
      );
    })())
  );
}
