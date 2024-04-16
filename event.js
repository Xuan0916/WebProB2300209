document.addEventListener('DOMContentLoaded', function () {
    const daysContainer = document.querySelector('.days');
    const eventDetails = document.getElementById('event-details');
    const eventTitle = document.getElementById('event-title');
    const eventDate = document.getElementById('event-date');
    const eventDescription = document.getElementById('event-description');
    const eventLink = document.getElementById('event-link');
  
    // Sample event data
    const events = [
      { date: '2024-04-15', title: 'Eco-Event 1', description: 'Description of Eco-Event 1', link: '#' },
      { date: '2024-04-22', title: 'Eco-Event 2', description: 'Description of Eco-Event 2', link: '#' },
      // Add more events as needed
    ];
  
    // Generate calendar days
    for (let i = 1; i <= 30; i++) {
      const day = document.createElement('div');
      day.textContent = i;
      daysContainer.appendChild(day);
  
      // Check if event exists for this day
      const event = events.find(event => event.date === `2024-04-${i < 10 ? '0' + i : i}`);
      if (event) {
        day.classList.add('has-event');
  
        // Add event details to card
        day.addEventListener('click', function () {
          eventTitle.textContent = event.title;
          eventDate.textContent = new Date(event.date).toDateString();
          eventDescription.textContent = event.description;
          eventLink.setAttribute('href', event.link);
          eventDetails.classList.remove('hidden');
        });
      }
    }
  
    // Event listeners for previous and next buttons
    document.querySelector('.prev').addEventListener('click', () => alert('Previous month'));
    document.querySelector('.next').addEventListener('click', () => alert('Next month'));
  });
  