<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>My React App</title>
    <script src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
  </head>
  <body>
    <div id="root"></div>
    <script>
      const Greeting = (props) => {
        return <h1>Hello, {props.name}!</h1>;
      }

      ReactDOM.render(
        <Greeting name="World" />,
        document.getElementById('root')
      );
    </script>
  </body>
</html>
