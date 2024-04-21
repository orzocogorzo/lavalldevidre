document.addEventListener("DOMContentLoaded", () => {
  const el = document.getElementById("calendar");
  const calendar = new FullCalendar.Calendar(el, {
    initialView: "dayGridMonth",
    locale: FullCalendar.globalLocales[0],
    events: (info, res, rej) => {
      const query = new URLSearchParams();
      query.append("start_date", info.startStr.replace(/T.*$/, ""));
      query.append("end_date", info.endStr.replace(/T.*$/, ""));
      fetch(vdvAgendaSettings.endpoint + "?" + query.toString(), {
        headers: {
          Accept: "application/json",
        },
      })
        .then((res) => res.json())
        .then((events) => {
          res(
            events.map((ev) => ({
              title: ev.title.rendered,
              start: ev.start_date,
              end: ev.end_date,
              extendedProps: {
                description: ev.excerpt.rendered,
              },
              url: ev.external_url,
            })),
          );
        })
        .catch((err) => rej(err));
    },
    eventMouseEnter: ({ el, event }) => {
      const { description } = event.extendedProps;
      const tooltip = document.createElement("div");
      tooltip.classList.add("fc-event-tooltip");
      if (event.start.getDay() === 0) {
        tooltip.classList.add("end-of-week");
      } else if (event.start.getDay() === 1) {
        tooltip.classList.add("start-of-week");
      }
      tooltip.innerHTML = description;
      el.appendChild(tooltip);
      el.parentElement.classList.add("fc-event-focus");
    },
    eventMouseLeave: ({ el }) => {
      el.parentElement.classList.remove('fc-event-focus')
      const tooltip = el.querySelector('.fc-event-tooltip');
      tooltip.parentElement.removeChild(tooltip);
    },
  });
  calendar.render();
});
