import { useEffect, useState } from "react";
import api from "./api";

function App() {

  const [board, setBoard] = useState(null);

  useEffect(() => {

    api.get("/boards/1")
      .then(res => {
        setBoard(res.data);
      });

  }, []);


  if (!board) {
    return <h2>Loading...</h2>;
  }


  return (
    <div style={{padding:"20px"}}>

      <h1>{board.name}</h1>

      <div style={{
        display:"flex",
        gap:"20px"
      }}>

      {board.lists?.map(list => (

        <div
          key={list.id}
          style={{
            width:"300px",
            background:"#eee",
            padding:"15px",
            borderRadius:"10px"
          }}
        >

          <h2>{list.name}</h2>

          {list.cards?.map(card => (

            <div
              key={card.id}
              style={{
                background:"white",
                padding:"10px",
                margin:"10px 0",
                borderRadius:"5px"
              }}
            >
              <b>{card.title}</b>
              <p>{card.description}</p>
            </div>

          ))}

        </div>

      ))}

      </div>

    </div>
  );
}

export default App;