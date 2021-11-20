const sections = Object.fromEntries(Array.from(document.getElementsByTagName('section'), (el)=>[el.id, el]));
let currentSection = undefined;

const renderSections = {
  products(container){
    const form = container.children[0];
    form.innerHTML = products.map(({title, image, price}, index)=>`<article>
      <img src="${image}" alt="">
      <div>
        <h2>${title}</h2>
        <span>$${price}</span>
        <input
          type="number"
          min="0"
          step="1"
          max="99"
          name="${index}"
          placeholder="Amount"
        >
      </div>
    </article>`).join('') + form.innerHTML;

    form.addEventListener('submit', (event)=>{
      event.preventDefault();

      const order = Object.fromEntries(
        Array.from(
          form.querySelectorAll('input[type="number"]'),
          (el)=>[el.name, Number.parseInt(el.value || '0')]
        ).map(([name, value])=>[name, Number.isNaN(value) ? 0 : value])
      );
      const isEmptyOrder = Object.values(order).every(value=>value===0);

      if(isEmptyOrder)
        return alert('Please select some products');
      else
        renderSection('userInfo', order);
    });
  },
  userInfo(container, order){
    const form = container.children[0];
    form.addEventListener('submit',(event)=>{
      event.preventDefault();
      const shippingOption =
        form.querySelector('input[name="shipping"]:checked').value;
      const shippingOptions = {
        'free': {
          title: '7 Day (free)',
          price: 0,
        },
        '50': {
          title: 'Overnight ($50.00)',
          price: 50,
        },
        '5': {
          title: 'Three Day ($5.00)',
          price: 5,
        }
      };
      const shipping = shippingOptions[shippingOption];
      renderSection(
        'checkout',
        [
          ...Object.entries(order).map(([index, ammount])=>({
            title: products[index].title,
            ammount,
            price: products[index].price * ammount,
          })).filter(({ammount})=>ammount!==0),
          {
            ...shipping,
            title: `Shipping: ${shipping.title}`,
            ammount: 1,
          }
        ],
        {
          email: form.querySelector('input[name="email"]').value,
          password: form.querySelector('input[name="password"]').value,
        }
      );
    });
  },
  checkout(container, order, userInfo){
    let total = 0;
    const tbody = container.getElementsByTagName('tbody')[0]; 

    tbody.innerHTML = order.map(({title, ammount, price})=>{
      total += price;
      return `<tr>
        <td>${title}</td>  
        <td>${ammount}</td>  
        <td>$${price}</td>  
      </tr>`;
    }).join('');

    container.querySelector('input[name="order"]').value = tbody.parentElement.outerHTML;
    container.querySelector('input[name="email"]').value = userInfo.email;
    container.querySelector('input[name="password"]').value = userInfo.password;

    const totalElement = container.querySelector('.total input');
    totalElement.value = total;
  },
};

Array.from(
  document.getElementsByClassName('back-button'),
  el=>el.addEventListener(
    'click',
    ()=>changeSection(el.getAttribute('data-section'))
  )
);


function renderSection(section, ...options){
  changeSection(section);
  renderSections[currentSection](sections[currentSection],...options);
}

function changeSection(section, ...options){
  if(typeof currentSection !== 'undefined')
    sections[currentSection].style.display = 'none';
  currentSection = section;
  sections[currentSection].style.display = '';
}
renderSection('products');
